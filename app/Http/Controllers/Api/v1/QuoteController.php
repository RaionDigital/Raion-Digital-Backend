<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Quote;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Http\Resources\QuoteResource;
use Exception;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return QuoteResource::collection(
                Quote::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Quotes data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuoteRequest $request)
    {
        try {
            $data = $request->validated();

            $quote = Quote::create($data);

            return response(new QuoteResource($quote), 201);
        } catch (Exception $e) {
            abort(500, 'Could not send your Quote request, please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        return new QuoteResource($quote);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        try {
            $data = $request->validated();

            $quote->update($data);

            return new QuoteResource($quote);
        } catch (Exception $e) {
            abort(500, 'Could not update Quote data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        try {

            $quote->delete();

            return response('Quote Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Quote');
        }
    }
}
