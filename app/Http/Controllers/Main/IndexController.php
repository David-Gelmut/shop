<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use function view;

class IndexController extends Controller
{
    public function __invoke()
    {
        $count_orders = Order::all()->count();
        $count_users = User::all()->count();
        $count_products =Product::all()->count();
        return view('main.index',[
            'count_orders'=>$count_orders,
            'count_users'=>$count_users,
            'count_products'=>$count_products,
        ]);
    }
}
