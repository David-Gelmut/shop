<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class IndexController extends Controller
{
   public function __invoke(IndexRequest $request)
   {
       $data = $request->validated();
       $filter = app()->make(ProductFilter::class,['queryParams'=>array_filter($data)]);
       if($data['sort']!=2)
           $products = Product::filter($filter)->orderBy('price')->paginate($data['count'],['*'],'page',$data['page']);
       else
           $products = Product::filter($filter)->orderByDesc('price')->paginate($data['count'],['*'],'page',$data['page']);

       return ProductResource::collection($products) ;

   }
}
