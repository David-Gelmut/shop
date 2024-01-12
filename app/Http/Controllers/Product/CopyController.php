<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;


class CopyController extends Controller
{
   public function __invoke(Product $product)
   {
     // dd($product);
       return redirect()->route('product.index');
   }
}
