<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function policy()
    {
        return view('front.static.policy');
    }
}
