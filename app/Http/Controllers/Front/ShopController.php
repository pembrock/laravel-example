<?php

namespace App\Http\Controllers\Front;

use App\Entities\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function shop()
    {
        $shop = Shop::where('is_visibility', 1)->orderBy('created_at', 'desc')->get();

        return view('front.shop.show', ['shop' => $shop]);
    }
}
