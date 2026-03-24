<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "product_id"=>$this->id,
            "product_title"=>$this->title,
            // "image"=>$this->image ? asset("storage/".$this->image): null ,
            "image"=>$this->when($this->image,asset("storage/".$this->image)),
            // "category"=>new CategoryRecource($this->category),
            "category"=>new CategoryRecource($this->whenLoaded('category')),
        ];
    }
}
