<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class MainController extends Controller
{
   public function __invoke()
   {
       return view('client.main.index');
   }
}
