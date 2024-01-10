<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\CartIndexRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class CartIndexController extends Controller
{
   public function __invoke(CartIndexRequest $request)
   {
       $data = $request->validated();
       $products = Product::find($data['ids']);
       return ProductResource::collection($products) ;
   }
}
