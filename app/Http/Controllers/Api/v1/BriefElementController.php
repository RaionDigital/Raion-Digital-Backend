<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\BriefElement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\BriefElementResource;
use App\Http\Requests\StoreBriefElementRequest;
use App\Http\Requests\UpdateBriefElementRequest;

class BriefElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return BriefElementResource::collection(
                BriefElement::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Brief Elements data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBriefElementRequest $request)
    {
        try {
            $data = $request->validated();
            $data['icon'] = $request->file('icon')->store('uploaded icons', 'public');

            $briefElement = BriefElement::create($data);

            return response(new BriefElementResource($briefElement), 201);
        } catch (Exception $e) {
            abort(500, 'Could not save Brief Element data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BriefElement $briefElement)
    {
        return new BriefElementResource($briefElement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBriefElementRequest $request, BriefElement $briefElement)
    {
        try {
            $data = $request->validated();
            if ($request->has('icon')) {
                File::delete($briefElement->icon);
                $data['icon'] = $request->file('icon')->store('uploaded icons', 'public');
            }

            $briefElement->update($data);

            return new BriefElementResource($briefElement);
        } catch (Exception $e) {
            abort(500, 'Could not update Brief Element data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BriefElement $briefElement)
    {
        try {
            File::delete($briefElement->image);
            $briefElement->delete();

            return response('Brief Element Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Brief Element data');
        }
    }
}
