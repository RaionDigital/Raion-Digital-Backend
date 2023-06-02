<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ProjectResource::collection(
                Project::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Projects data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            $data = $request->validated();
            $data['logo'] = $request->file('logo')->store('uploaded-images', 'public');

            $project = Project::create($data);

            return response(new ProjectResource($project), 201);
        } catch (Exception $e) {
            abort(500, 'Could not save Project data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            $data = $request->validated();
            if ($request->has('logo')) {
                File::delete($project->logo);
                $data['logo'] = $request->file('logo')->store('uploaded-images', 'public');
            }

            $project->update($data);

            return new ProjectResource($project);
        } catch (Exception $e) {
            abort(500, 'Could not update Project data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            File::delete($project->logo);
            $project->delete();

            return response('Project Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Project');
        }
    }
}
