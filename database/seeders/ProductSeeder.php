<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Product::insert([

            [
                'name' => 'Visionary Oud',
                'image' => 'Visionary Oud.png',
                'collection' => 'Premium Collection',
                'category' => 'Men',
                'price' => 499.99,
                'stock' => 25,
                'top_notes' => 'Oud',
                'middle_notes' => 'Amber',
                'base_notes' => 'Musk',
                'longevity' => 'Very Long',
                'description' => 'A luxurious oud fragrance with warm amber and musk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'name' => 'Vanilla Sweet',
                'image' => 'Vanilla sweet1.png',
                'collection' => 'Signature Scent',
                'category' => 'Ladies',
                'price' => 399.99,
                'stock' => 30,
                'top_notes' => 'Vanilla',
                'middle_notes' => 'Orchid',
                'base_notes' => 'Brown Sugar',
                'longevity' => 'Long',
                'description' => 'A warm and sweet fragrance with creamy vanilla notes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

             [
                'name' => 'Velvet Rose',
                'image' => 'velvet-rose.png',
                'collection' => 'Luxury Edition',
                'category' => 'Ladies',
                'price' => 349.99,
                'stock' => 18,
                'top_notes' => 'Rose',
                'middle_notes' => 'Jasmine',
                'base_notes' => 'White Musk',
                'longevity' => 'Very Long',
                'description' => 'Elegant floral fragrance with rich rose accords.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Rush',
                'image' => 'rush.jpg',
                'collection' => 'Premium Collection',
                'category' => 'Unisex',
                'price' => 549.99,
                'stock' => 20,
                'top_notes' => 'Peach',
                'middle_notes' => 'Gardenia',
                'base_notes' => 'Coriander',
                'longevity' => 'Long',
                'description' => 'Fresh floral fragrance suitable for everyone.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'The One',
                'image' => 'theone.jpg',
                'collection' => 'Signature Scent',
                'category' => 'Men',
                'price' => 599.99,
                'stock' => 22,
                'top_notes' => 'Grapefruit',
                'middle_notes' => 'Basil',
                'base_notes' => 'Coriander',
                'longevity' => 'Long',
                'description' => 'A masculine fragrance with citrus and woody notes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Away',
                'image' => 'away.png',
                'collection' => 'Luxury Edition',
                'category' => 'Unisex',
                'price' => 699.99,
                'stock' => 15,
                'top_notes' => 'Oud',
                'middle_notes' => 'Saffron',
                'base_notes' => 'Amber',
                'longevity' => 'Very Long',
                'description' => 'A mysterious and luxurious oud fragrance.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

       ]);
    }
}
