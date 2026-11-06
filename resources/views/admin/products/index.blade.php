@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-gold" style="font-family:'Cormorant Garamond', serif;">Product & Stock Management</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-gold">Add New Product</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">Product Name</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    @if($product->image)
                                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 5px; margin-right: 15px;">
                                    @else
                                        <div style="width: 40px; height: 40px; background: #333; border-radius: 5px; margin-right: 15px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-solid fa-image text-secondary"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <strong>{{ $product->name }}</strong><br>
                                        <small class="text-secondary">{{ Str::limit($product->description, 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                @if($product->stock > 10)
                                    <span class="badge bg-success">{{ $product->stock }} in stock</span>
                                @elseif($product->stock > 0)
                                    <span class="badge bg-warning text-dark">Low Stock: {{ $product->stock }}</span>
                                @else
                                    <span class="badge bg-danger">Out of Stock</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-secondary py-4">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection