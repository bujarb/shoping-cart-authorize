<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;

class ProfileController extends Controller
{
    public function getProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile',['orders'=>$orders]);
    }
}
