<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Http\Requests\StoreContactSubmissionRequest;
use App\Http\Requests\UpdateContactSubmissionRequest;

class ContactSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactSubmissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactSubmission $contactSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactSubmissionRequest $request, ContactSubmission $contactSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactSubmission $contactSubmission)
    {
        //
    }
}
