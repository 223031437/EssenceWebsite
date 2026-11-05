@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-gold" style="font-family:'Cormorant Garamond', serif;">Order #{{ $order->id }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-light">Back to Orders</a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card p-4 mb-4">
                <h5 class="text-secondary mb-3">Items Ordered</h5>
                <table class="table table-dark">
                    <thead>
                        <tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th></tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name ?? 'Deleted Product' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4 class="text-end mt-3">Total: <span class="text-gold">${{ number_format($order->total, 2) }}</span></h4>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card p-4 mb-4">
                <h5 class="text-secondary mb-3">Customer Info</h5>
                <p><strong>Name:</strong> {{ $order->user->name ?? 'Guest' }}</p>
                <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
            </div>

            <div class="card p-4">
                <h5 class="text-secondary mb-3">Update Status</h5>
                <form method="POST" action="{{ route('admin.orders.updateStatus', $order) }}">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="form-select bg-dark text-white border-secondary mb-3">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit" class="btn btn-gold w-100">Update Order</button>
                </form>
            </div>
        </div>
    </div>
@endsection