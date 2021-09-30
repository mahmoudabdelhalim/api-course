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
            "item_id" => $this->resource->id,
            "item_name" => $this->name !==null ? $this->name : '',
            "description" => $this->resource->Description !==null ? $this->resource->Description : '' ,
            "item_price" => $this->resource->Price ?? '',
            "stock_qty" => $this->resource->StockQuantity ?? '',
            "currency_code" => $this->resource->CurrencyCode ?? '',
            "item_image_url" => $this->resource->ImageUrl ?? '',
            "sizes"=> SizeResource::collection($this->sizes),
            'review'=>ReviewResource::collection($this->review),
            "details"=> DetailsResource::collection($this->details),
            "color"=> ColorResource::collection($this->color),
            "images"=> ProImageResource::collection($this->images),


            ];
    }

}
