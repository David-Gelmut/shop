<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ProductUser;

class DeleteController extends Controller
{
   public function __invoke(Product $product)
   {
       $id = $product->id;
       ColorProduct::where('product_id',$id)->delete();
       ProductUser::where('product_id',$id)->delete();
       ProductTag::where('product_id',$id)->delete();
       $product->delete();
       return redirect()->route('product.index');
   }
}
