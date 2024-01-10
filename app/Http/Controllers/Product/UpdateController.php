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

       $tagsIds = $data['tags'];
       $colorsIds = $data['colors'];

       unset($data['tags'], $data['colors']);
       if($data['prev_image'])
            $data['prev_image'] = Storage::disk('public')->put('/images', $data['prev_image']);

       $product->update($data);
       $product->tags()->sync($tagsIds);
       $product->colors()->sync($colorsIds);

       return view('product.show',['product'=>$product]);
   }
}
