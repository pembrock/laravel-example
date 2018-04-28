<?php

namespace App\Http\Controllers\Front;

use App\Entities\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function contacts()
    {
        $page = Setting::where('name', 'contacts')->first();
        return view('front.static.page', ['data' => $page]);
    }
    public function policy()
    {
        $page = Setting::where('name', 'policy')->first();
        return view('front.static.page', ['data' => $page]);
    }
}
