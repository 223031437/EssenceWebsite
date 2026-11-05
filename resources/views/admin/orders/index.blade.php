@extends('layouts.admin')

@section('content')
    <h1 class="text-gold mb-4" style="font-family:'Cormorant Garamond', serif;">Manage Orders</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">Order #</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td class="ps-4">#{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? 'Guest' }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($order->status == 'shipped')
                                    <span class="badge bg-info text-dark">Shipped</span>
                                @elseif($order->status == 'delivered')
                                    <span class="badge bg-success">Delivered</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-light">View Details</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-4">No orders yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection