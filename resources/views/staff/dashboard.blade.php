@extends('layouts.admin') <!-- We reuse the layout, but we will hide the Admin sidebar links -->

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-gold" style="font-family:'Cormorant Garamond', serif;">Stock Management</h1>
        <span class="badge bg-secondary">Employee Access</span>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">Product</th>
                        <th>Price</th>
                        <th>Current Stock</th>
                        <th>Update Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    @if($product->image)
                                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 5px; margin-right: 15px;">
                                    @endif
                                    <div>
                                        <strong>{{ $product->name }}</strong><br>
                                        <small class="text-secondary">{{ $product->collection }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                @if($product->stock > 10)
                                    <span class="badge bg-success">{{ $product->stock }} in stock</span>
                                @elseif($product->stock > 0)
                                    <span class="badge bg-warning text-dark">Low: {{ $product->stock }}</span>
                                @else
                                    <span class="badge bg-danger">Out of Stock</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('staff.stock.update', $product) }}" class="d-flex align-items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="stock" value="{{ $product->stock }}" class="form-control form-control-sm bg-dark text-white border-secondary" style="width: 80px;" min="0" required>
                                    <button type="submit" class="btn btn-sm btn-gold">Update</button>
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