<?php

namespace App\Http\Controllers\Order;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Mail\OrderMailer;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $order = Order::FirstOrCreate($data);
        event(new OrderCreated($order));
        return redirect()->route('order.index');
    }
}
