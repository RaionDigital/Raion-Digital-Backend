<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\ContactSubmission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\ContactSubmissionResource;
use App\Http\Requests\StoreContactSubmissionRequest;
use App\Mail\ContactSubmitted;

class ContactSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ContactSubmissionResource::collection(
                ContactSubmission::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Contact Submissions data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactSubmissionRequest $request)
    {
        try {
            $data = $request->validated();

            $contactSubmission = ContactSubmission::create($data);

            try {
                Mail::mailer('smtp')->to('info@raiondigital.com')->send(new ContactSubmitted($contactSubmission));
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
            return response(new ContactSubmissionResource($contactSubmission), 201);
        } catch (Exception $e) {
            abort(500, 'Could not send Contact Info');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactSubmission $contactSubmission)
    {
        return new ContactSubmissionResource($contactSubmission);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactSubmission $contactSubmission)
    {
        try {

            $contactSubmission->delete();

            return response('Contact Submission  Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Contact Submission data');
        }
    }
}
