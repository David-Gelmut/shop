<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
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
            'id'=>$this->id,
            'title'=>$this->title,
            'desc'=>$this->desc,
            'content'=>$this->content,
            'image_url'=>$this->imageUrl,
            'count'=>$this->count,
            'price'=>$this->price,
            'is_published'=>$this->is_published,
            'category'=>new CategoryResource($this->category),
            'tags'=>$this->tags,
            'colors'=>$this->colors,

        ];
    }
}
