<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'collection' => 'required|string|max:255',
            'category' => 'required|in:Men,Ladies,Unisex',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'top_notes' => 'required|string|max:255',
            'middle_notes' => 'required|string|max:255',
            'base_notes' => 'required|string|max:255',
            'longevity' => 'required|in:Moderate,Long,Very Long', 
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Create a unique name based on time and original name
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            // Move the file directly to public/images/products
            $file->move(public_path('images/products'), $filename);
            
            // Save just the filename in the database
            $validated['image'] = $filename;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'collection' => 'required|string|max:255',
            'category' => 'required|in:Men,Ladies,Unisex',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'top_notes' => 'required|string|max:255',
            'middle_notes' => 'required|string|max:255',
            'base_notes' => 'required|string|max:255',
            'longevity' => 'required|in:Moderate,Long,Very Long', 
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Optional: Delete the old image if it exists to save space
            if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
                unlink(public_path('images/products/' . $product->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);
            
            $validated['image'] = $filename;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted successfully.');
    }
}