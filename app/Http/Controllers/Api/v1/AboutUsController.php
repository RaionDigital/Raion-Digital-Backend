<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\AboutUsResource;
use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return AboutUsResource::collection(
                AboutUs::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the About Us data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutUsRequest $request)
    {
        try {
            $data = $request->validated();
            $data['image'] = $request->file('image')->store('uploaded-images', 'public');
            $data['video'] = $request->file('video')->store('uploaded-videos', 'public');
            $data['service_icon1'] = $request->file('service_icon1')->store('uploaded-icons', 'public');
            $data['service_icon2'] = $request->file('service_icon2')->store('uploaded-icons', 'public');
            $aboutUs = AboutUs::create($data);

            return response(new AboutUsResource($aboutUs), 201);
        } catch (Exception $e) {
            abort(500, 'Could not save About Us data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        return new AboutUsResource($aboutUs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutUsRequest $request, AboutUs $aboutUs)
    {
        try {
            $data = $request->validated();
            if ($request->has('image')) {
                File::delete($aboutUs->image);


                $data['image'] = $request->file('image')->store('uploaded-images', 'public');
            }
            if ($request->has('video')) {
                File::delete($aboutUs->video);

                $data['video'] = $request->file('video')->store('uploaded-videos', 'public');
            }
            if ($request->has('service_icon1')) {
                File::delete($aboutUs->service_icon1);

                $data['service_icon1'] = $request->file('service_icon1')->store('uploaded-icons', 'public');
            }
            if ($request->has('service_icon2')) {
                File::delete($aboutUs->service_icon2);
                $data['service_icon2'] = $request->file('service_icon2')->store('uploaded-icons', 'public');
            }
            $aboutUs->update($data);

            return new AboutUsResource($aboutUs);
        } catch (Exception $e) {
            abort(500, 'Could not update About Us data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        try {
            File::delete($aboutUs->image);
            File::delete($aboutUs->video);
            File::delete($aboutUs->service_icon1);
            File::delete($aboutUs->service_icon2);
            $aboutUs->delete();

            return response('About Us Section Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete About Us data');
        }
    }
}
