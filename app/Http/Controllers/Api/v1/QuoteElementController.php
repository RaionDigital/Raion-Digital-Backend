<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\QuoteElement;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteElementRequest;
use App\Http\Requests\UpdateQuoteElementRequest;
use App\Http\Resources\QuoteElementResource;
use Exception;

class QuoteElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return QuoteElementResource::collection(
                QuoteElement::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Quote Elements data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuoteElementRequest $request)
    {
        try {
            $data = $request->validated();

            $quoteElement = QuoteElement::create($data);

            return response(new QuoteElementResource($quoteElement), 201);
        } catch (Exception $e) {
            abort(500, 'Could not save Quote Element');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(QuoteElement $quoteElement)
    {
        return new QuoteElementResource($quoteElement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteElementRequest $request, QuoteElement $quoteElement)
    {
        try {
            $data = $request->validated();

            $quoteElement->update($data);

            return new QuoteElementResource($quoteElement);
        } catch (Exception $e) {
            abort(500, 'Could not update Quote Element data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuoteElement $quoteElement)
    {
        try {
            $quoteElement->delete();

            return response('Quote Element Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Quote Element');
        }
    }
}
