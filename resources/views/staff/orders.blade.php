@extends('layouts.admin')

@section('content')
    <h1 class="text-gold mb-4" style="font-family:'Cormorant Garamond', serif;">Orders to Pack</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">Order #</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td class="ps-4">#{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? 'Guest' }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">Needs Packing</span>
                                @elseif($order->status == 'shipped')
                                    <span class="badge bg-info text-dark">Shipped</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center py-4">No orders to pack.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection