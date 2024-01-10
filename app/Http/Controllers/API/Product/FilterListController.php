<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class FilterListController extends Controller
{
   public function __invoke(Product $product)
   {
       $prices = [];
      $categories = Category::all() ;
      $colors = Color::all() ;
      $tags = Tag::all() ;

      $maxPrice = Product::orderBy('price','DESC')->first()->price;
      $minPrice = Product::orderBy('price','ASC')->first()->price;

       isset($minPrice)?$prices['min'] = $minPrice:0;
       isset($maxPrice)?$prices['max'] = $maxPrice:50000000;

      $result = [
          'categories'=>  $categories,
          'colors'=>  $colors,
          'tags'=>  $tags,
          'price'=>$prices
      ];
        return response()->json($result);
   }
}
