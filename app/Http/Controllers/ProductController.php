<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::take(3)->get();
        return view('home', compact('products'));
    }

    public function catalog(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->string('search')->trim();
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('collection', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('top_notes', 'like', "%{$search}%")
                    ->orWhere('middle_notes', 'like', "%{$search}%")
                    ->orWhere('base_notes', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && in_array($request->category, ['Ladies', 'Men', 'Unisex'], true)) {
            $query->where('category', $request->category);
        }

        if ($request->filled('longevity') && is_array($request->longevity)) {
            $query->whereIn('longevity', array_intersect($request->longevity, ['Moderate', 'Long', 'Very Long']));
        }

        if ($request->filled('top_note')) {
            $noteTerms = [
                'Citrus' => ['citrus', 'grapefruit', 'bergamot', 'lemon', 'orange', 'lime'],
                'Floral' => ['rose', 'jasmine', 'gardenia', 'orchid', 'lavender'],
                'Woody' => ['oud', 'musk', 'cedar', 'sandalwood', 'woody'],
                'Sweet' => ['vanilla', 'brown sugar', 'caramel', 'sweet', 'amber'],
            ];

            $selectedNotes = array_intersect((array) $request->top_note, array_keys($noteTerms));
            if ($selectedNotes) {
                $query->where(function ($q) use ($selectedNotes, $noteTerms) {
                    foreach ($selectedNotes as $note) {
                        foreach ($noteTerms[$note] as $term) {
                            $q->orWhere('top_notes', 'like', "%{$term}%")
                              ->orWhere('middle_notes', 'like', "%{$term}%")
                              ->orWhere('base_notes', 'like', "%{$term}%");
                        }
                    }
                });
            }
        }

        $products = $query->latest()->get();

        return view('catalog', compact('products'));
    }

    public function show(Product $product)
    {
        
        $reviews = Review::with('user')->where('product_id', $product->id)->latest()->get();
        $averageRating = round($reviews->avg('rating') ?? 0, 1);

        return view('product-details', compact('product', 'reviews', 'averageRating'));
    }
}
