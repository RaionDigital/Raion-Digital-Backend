<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use App\Http\Resources\ContactUsResource;
use Exception;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ContactUsResource::collection(
                ContactUs::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Contact Us Section data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactUsRequest $request)
    {
        try {
            $data = $request->validated();

            $contactUs = ContactUs::create($data);

            return response(new ContactUsResource($contactUs), 201);
        } catch (Exception $e) {
            abort(500, 'Could not save Contact Us Section data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        return new ContactUsResource($contactUs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactUsRequest $request, ContactUs $contactUs)
    {
        try {
            $data = $request->validated();


            $contactUs->update($data);

            return new ContactUsResource($contactUs);
        } catch (Exception $e) {
            abort(500, 'Could not update Contact Us data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        try {

            $contactUs->delete();

            return response('Contact Us Section Data  Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Contact Us Section data');
        }
    }
}
