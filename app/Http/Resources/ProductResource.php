<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'brand' => $this->brand,
            'image' => $this->image,
            'details' => $this->details,
            'price' => $this->price,
            'category' => $this->category->title,
        ];
    }
}
