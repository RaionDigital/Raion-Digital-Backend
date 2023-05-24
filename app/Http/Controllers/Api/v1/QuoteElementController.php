<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\QuoteElement;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteElementRequest;
use App\Http\Requests\UpdateQuoteElementRequest;

class QuoteElementController extends Controller
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
    public function store(StoreQuoteElementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(QuoteElement $quoteElement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteElementRequest $request, QuoteElement $quoteElement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuoteElement $quoteElement)
    {
        //
    }
}
