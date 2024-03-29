<?php

namespace App\Http\Controllers\API\Product;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\CartOrderRequest;
use App\Http\Resources\Product\ProductResource;
use App\Mail\OrderMailer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class CartOrderController extends Controller
{
   public function __invoke(CartOrderRequest $request)
   {
       $data_request = $request->validated();
       $result = [];
       foreach ($data_request['data'] as $product) {
           $result[$product['id']] = ['title'=>$product['title'],'price'=>$product['price'],'count'=>$product['count'],'count_order'=>$data_request['counts'][$product['id']]];
       }
       $data_request['data'] = json_encode($result);
       unset($data_request['counts']);
       $order = Order::firstOrCreate($data_request);
       event(new OrderCreated($order));
       return $result;
   }
}
