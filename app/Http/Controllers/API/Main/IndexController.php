<?php

namespace App\Http\Controllers\API\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\IndexRequest;

class IndexController extends Controller
{
    public function __invoke()
    {
        return true;
    }
}
