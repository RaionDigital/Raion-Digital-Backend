<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Http\Requests\StoreHeaderRequest;
use App\Http\Requests\UpdateHeaderRequest;

class HeaderController extends Controller
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
    public function store(StoreHeaderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Header $header)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeaderRequest $request, Header $header)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        //
    }
}
