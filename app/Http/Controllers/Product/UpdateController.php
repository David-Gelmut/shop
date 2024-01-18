<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request,Product $product)
   {
       $data = $request->validated();
       $tagsIds = [];
       $colorsIds = [];
       if(array_key_exists('tags',$data)){
           $tagsIds = $data['tags'];
           unset($data['tags']);
           $product->tags()->sync($tagsIds);
       }
       if(array_key_exists('colors',$data)){
           $colorsIds = $data['colors'];
           unset($data['colors']);
           $product->colors()->sync($colorsIds);
       }

       if(array_key_exists('prev_image',$data))
           $data['prev_image'] = Storage::disk('public')->put('/images', $data['prev_image']);
       $product->update($data);

       return view('product.show',['product'=>$product]);
   }
}
