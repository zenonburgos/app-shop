<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update()
    {

    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save(); // UPDATE

    	$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto vía mail!';
    	return back()->with(compact('notification'));
    	
    }
}
