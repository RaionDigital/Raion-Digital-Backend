<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResource extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'main_title' => $this->main_title,
            'main_description' => $this->main_description,
            'image' => asset('storage/' . $this->image),
            'service_icon1' => asset('storage/' . $this->service_icon1),
            'service_description1' => $this->service_description1,
            'service_icon2' => asset('storage/' . $this->service_icon2),
            'service_description2' => $this->service_description2,
            'video_title' => $this->video_title,
            'video_url' => $this->video_url,
            'video' => asset('storage/' . $this->video),
        ];
    }
}
