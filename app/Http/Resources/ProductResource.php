<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SizeResource;
use App\Http\Resources\DetailsResource;
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
            "item_id" => $this->id,
            "item_name" => $this->name !==null ? $this->name : '',
            "description" => $this->description !==null ? $this->description : '' ,
            "price" => $this->price ?? '',
            "price_after_discount" => $this->price_after_discount ?? '',
            "discount" => $this->discount ?? '',
            "item_image_url" => $this->item_image_url ?? '',
            "sizes"=> SizeResource::collection($this->sizes),
            'review'=>ReviewResource::collection($this->review),
            "details"=> DetailsResource::collection($this->details),
            "color"=> ColorResource::collection($this->color),
            "images"=> ProImageResource::collection($this->images),


            ];
    }

}
