<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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

            "rate_no" => $this->rate_no,
            'comment'=>$this->comment,

            "user"=>new UserResource($this->user),



            ];
    }
}
