<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;

class CreateController extends Controller
{
   public function __invoke()
   {
       $this->authorize('create',auth()->user());
       return view('order.create');
   }
}
