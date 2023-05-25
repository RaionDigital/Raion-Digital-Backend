<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderElementResource extends JsonResource
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
            'top_title' => $this->top_title,
            'main_title' => $this->main_title,
            'button_text' => $this->button_text,
            'button_url'  => $this->button_url,
            'image' => $this->image
        ];
    }
}
