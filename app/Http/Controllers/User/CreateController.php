<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
   public function __invoke()
   {
       $this->authorize('create',auth()->user());
       $roles = User::getRoles();
       return view('user.create',['roles'=>$roles]);
   }
}
