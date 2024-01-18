<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        $tagsIds = [];
        $colorsIds = [];
        if(array_key_exists('prev_image',$data))
            $data['prev_image'] = Storage::disk('public')->put('/images', $data['prev_image']);
        if(array_key_exists('prev_image',$data)){
            $tagsIds = $data['tags'];unset($data['tags']);
        }
        if(array_key_exists('prev_image',$data)){
            $colorsIds = $data['colors'];
            unset($data['colors']);
        }


        $product = Product::FirstOrCreate($data);


        foreach ($tagsIds as $tagId) {

            ProductTag::FirstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId
            ]);

        }

        foreach ($colorsIds as $colorId) {

            ColorProduct::FirstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorId
            ]);

        }

        return redirect()->route('product.index');
    }
}
