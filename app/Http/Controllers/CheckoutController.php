<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your shopping bag is empty.');
        }

        $subtotal = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);
        $tax = round($subtotal * 0.15, 2);

        return view('check-out.check-out', compact('cartItems', 'subtotal', 'tax'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:20'],
            'phone' => ['required', 'string', 'max:30'],
            'delivery_method' => ['required', 'in:standard,express'],
            'payment_method' => ['required', 'in:card'],
        ]);

        $order = DB::transaction(function () use ($validated) {
            $cartItems = Cart::with('product')
                ->where('user_id', auth()->id())
                ->lockForUpdate()
                ->get();

            if ($cartItems->isEmpty()) {
                abort(422, 'Your shopping bag is empty.');
            }

            foreach ($cartItems as $item) {
                if ($item->quantity > $item->product->stock) {
                    abort(422, "Not enough stock is available for {$item->product->name}.");
                }
            }

            $subtotal = round($cartItems->sum(fn ($item) => $item->product->price * $item->quantity), 2);
            $tax = round($subtotal * 0.15, 2);
            $deliveryFee = $validated['delivery_method'] === 'express' ? 40.00 : 0.00;
            $total = round($subtotal + $tax + $deliveryFee, 2);

            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'ORD-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(5)),
                'full_name' => $validated['full_name'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'postal_code' => $validated['postal_code'],
                'phone' => $validated['phone'],
                'delivery_method' => $validated['delivery_method'],
                'subtotal' => $subtotal,
                'tax' => $tax,
                'delivery_fee' => $deliveryFee,
                'total' => $total,
                'payment_method' => 'Card',
                'status' => 'Processing',
            ]);

            foreach ($cartItems as $item) {
                $product = $item->product;

                $order->items()->create([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item->quantity,
                    'line_total' => round($product->price * $item->quantity, 2),
                ]);

                $product->decrement('stock', $item->quantity);
            }

            Cart::where('user_id', auth()->id())->delete();

            return $order;
        });

        return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully.');
    }
}
