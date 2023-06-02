<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\SliderElement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\SliderElementResource;
use App\Http\Requests\StoreSliderElementRequest;
use App\Http\Requests\UpdateSliderElementRequest;

class SliderElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return SliderElementResource::collection(
                SliderElement::query()
                    ->orderBy('id', 'desc')
                    ->get(),
            );
        } catch (Exception $e) {
            abort(500, 'Something went wrong! We could not get the Slider Elements data');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderElementRequest $request)
    {
        try {
            $data = $request->validated();
            $data['image'] = $request->file('image')->store('uploaded-sliders', 'public');

            $sliderElement = SliderElement::create($data);

            return response(new SliderElementResource($sliderElement), 201);
        } catch (Exception $e) {
            abort(500, 'Could not save Slider Element');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SliderElement $sliderElement)
    {
        return new SliderElementResource($sliderElement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderElementRequest $request, SliderElement $sliderElement)
    {
        try {
            $data = $request->validated();
            if ($request->has('image')) {
                File::delete($sliderElement->image);
                $data['image'] = $request->file('image')->store('uploaded-sliders', 'public');
            }

            $sliderElement->update($data);

            return new SliderElementResource($sliderElement);
        } catch (Exception $e) {
            abort(500, 'Could not update Slider Element data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SliderElement $sliderElement)
    {
        try {
            File::delete($sliderElement->image);
            $sliderElement->delete();

            return response('Slider Element Deleted Successfully', 204);
        } catch (Exception $e) {
            abort(500, 'Could not delete Slider Element data');
        }
    }
}
