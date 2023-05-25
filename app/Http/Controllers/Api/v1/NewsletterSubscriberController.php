<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use App\Http\Requests\StoreNewsletterSubscriberRequest;
use App\Http\Resources\NewsletterSubscriberResource;
use Exception;

class NewsletterSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return NewsletterSubscriberResource::collection(
                NewsletterSubscriber::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Header Section data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsletterSubscriberRequest $request)
    {
        try {
            $data = $request->validated();

            $newsletterSubscriber = NewsletterSubscriber::create($data);

            return response(new NewsletterSubscriberResource($newsletterSubscriber), 201);
        } catch (Exception $e) {
            abort(500, 'Could not subscribe you to our newsletter, please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsletterSubscriber $newsletterSubscriber)
    {
        return new NewsletterSubscriberResource($newsletterSubscriber);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        try {
            $newsletterSubscriber->delete();

            return response('Newsletter Subscriber Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Newsletter Subscriber');
        }
    }
}
