<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ServiceResource::collection(
                Service::query()
                    ->orderBy('id', 'asc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Services Section data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        try {
            $data = $request->validated();
            $data['icon'] = $request->file('icon')->store('uploaded-icons', 'public');

            $service = Service::create($data);

            return response(new ServiceResource($service), 201);
        } catch (Exception $e) {
            abort(500, 'Could not save Services Section Element');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        try {
            $data = $request->validated();
            if ($request->has('icon')) {
                File::delete($service->icon);
                $data['icon'] = $request->file('icon')->store('uploaded-icons', 'public');
            }

            $service->update($data);

            return new ServiceResource($service);
        } catch (Exception $e) {
            abort(500, 'Could not update Services Section Element data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            File::delete($service->image);
            $service->delete();

            return response('Services Section Element Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Services Section Element data');
        }
    }
}
