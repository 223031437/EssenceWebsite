<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('check-out.check-out', compact('cartItems', 'subtotal'));
    }
}
