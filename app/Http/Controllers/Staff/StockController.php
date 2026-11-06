<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        // Employees can see all products to check stock
        $products = Product::latest()->get();
        return view('staff.dashboard', compact('products'));
    }

    public function updateStock(Request $request, Product $product)
    {
        // Validate the new stock amount
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        // Update only the stock
        $product->update(['stock' => $request->stock]);

        return back()->with('success', $product->name . ' stock updated to ' . $request->stock);
    }

    public function orders()
    {
        // Employees can see all orders to pack them
        $orders = \App\Models\Order::with('user')->latest()->get();
        return view('staff.orders', compact('orders'));
    }
}