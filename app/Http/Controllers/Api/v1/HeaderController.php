<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Header;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHeaderRequest;
use App\Http\Resources\HeaderResource;
use Exception;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return HeaderResource::collection(
                Header::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Header Section data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Header $header)
    {
        return new HeaderResource($header);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeaderRequest $request, Header $header)
    {
        try {
            $data = $request->validated();

            $header->update($data);

            return new HeaderResource($header);
        } catch (Exception $e) {
            abort(500, 'Could not update the Header Section data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        try {
            $header->delete();

            return response('Header Section Data  Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Header Section data');
        }
    }
}
