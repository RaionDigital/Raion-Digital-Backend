<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\BriefElement;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBriefElementRequest;
use App\Http\Requests\UpdateBriefElementRequest;

class BriefElementController extends Controller
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
    public function store(StoreBriefElementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BriefElement $briefElement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBriefElementRequest $request, BriefElement $briefElement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BriefElement $briefElement)
    {
        //
    }
}
