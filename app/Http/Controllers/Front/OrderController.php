<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        return view('front.order.index');
    }

    public function sendEMail()
    {
        $data = array('name'=>"Sam Jose", "body" => "Test mail");

        Mail::send('front.order.email', $data, function($message) {
            $message->to('pembrock@gmail.com', 'Artisans Web')
                ->subject('Artisans Web Testing Mail');
            $message->from('privatechillout@gmail.com','Coast');
        });
    }
}
