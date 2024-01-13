<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function __invoke()
   {
       $this->authorize('view',auth()->user());
       $users = User::all();
       return view('user.index',['users'=>$users]);
   }
}
