<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        $currentQuantity = $cart?->quantity ?? 0;
        $quantity = max(1, (int) $request->input('quantity', 1));

        if ($currentQuantity + $quantity > $product->stock) {
            return back()->with('error', 'The requested quantity is not available in stock.');
        }

        if ($cart) {
            $cart->increment('quantity', $quantity);
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        if ($request->boolean('redirect_checkout')) {
            return redirect()->route('checkout.index');
        }

        return redirect()->route('cart.index')->with('success', 'Product added to your shopping bag.');
    }

    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        $subtotal = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);
        $tax = round($subtotal * 0.15, 2);

        return view('shopping-bag', compact('cartItems', 'subtotal', 'tax'));
    }

    public function increase(Cart $cart)
    {
        abort_unless($cart->user_id === auth()->id(), 403);

        if ($cart->quantity >= $cart->product->stock) {
            return back()->with('error', 'You have reached the available stock for this product.');
        }

        $cart->increment('quantity');
        return back();
    }

    public function decrease(Cart $cart)
    {
        abort_unless($cart->user_id === auth()->id(), 403);

        if ($cart->quantity > 1) {
            $cart->decrement('quantity');
        } else {
            $cart->delete();
        }

        return back();
    }

    public function remove(Cart $cart)
    {
        abort_unless($cart->user_id === auth()->id(), 403);
        $cart->delete();
        return back()->with('success', 'Product removed from your shopping bag.');
    }
}
