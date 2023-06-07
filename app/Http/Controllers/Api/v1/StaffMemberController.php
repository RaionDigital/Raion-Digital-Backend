<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\StaffMember;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\StaffMemberResource;
use App\Http\Requests\StoreStaffMemberRequest;
use App\Http\Requests\UpdateStaffMemberRequest;

class StaffMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return StaffMemberResource::collection(
                StaffMember::query()
                    ->orderBy('id', 'asc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Staff Members data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffMemberRequest $request)
    {
        try {
            $data = $request->validated();
            $data['graphic'] = $request->file('graphic')->store('uploaded-images', 'public');

            $staffMember = StaffMember::create($data);

            return response(new StaffMemberResource($staffMember), 201);
        } catch (Exception $e) {
            abort(500, 'Could not save Staff Member data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffMember $staffMember)
    {
        return new StaffMemberResource($staffMember);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffMemberRequest $request, StaffMember $staffMember)
    {
        try {
            $data = $request->validated();
            if ($request->has('graphic')) {
                File::delete($staffMember->graphic);
                $data['graphic'] = $request->file('graphic')->store('uploaded-images', 'public');
            }

            $staffMember->update($data);

            return new StaffMemberResource($staffMember);
        } catch (Exception $e) {
            abort(500, 'Could not update Staff Member data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffMember $staffMember)
    {
        try {
            File::delete($staffMember->graphic);
            $staffMember->delete();

            return response('Staff Member Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Staff Member data');
        }
    }
}
