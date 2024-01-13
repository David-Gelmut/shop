<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class IndexController extends Controller
{
   public function __invoke()
   {
       $this->authorize('view',auth()->user());
       $orders = Order::all();
       return view('order.index',['orders'=>$orders]);
   }
}
