<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            background: #050505;
            color: #d3d3d3;
            font-family: Arial;
        }

        .card, .list-group-item {
            background: #1f1f1f !important;
            color: #f5f5f5 !important;
            border: 1px solid #c79a5b !important;
        }

        .gold {
            color: #d6ae73;
        }

        .btn-gold {
            background: #c79a5b;
            color: #050505;
            border: none;
            font-weight: bold;
        }

        .btn-gold:hover {
            background: #d6ae73;
            color: #050505;
        }
    </style>
</head>

<body>

    @include('partials.header')

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="gold">My Orders</h2>

            <a class="btn btn-gold" href="{{ route('catalog') }}">
                Continue Shopping
            </a>
        </div>

        {{-- Success message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Orders listing --}}
        @if($orders->isEmpty())

            <div class="card p-4 text-center">
                You have no orders yet.
            </div>

        @else

            <div class="list-group">

                @foreach($orders as $order)

                    <a href="{{ route('orders.show', $order) }}"
                       class="list-group-item list-group-item-action">

                        <div class="d-flex justify-content-between">
                            <strong>{{ $order->order_number }}</strong>

                            <span>
                                R{{ number_format($order->total, 2) }}
                            </span>
                        </div>

                        <small>
                            {{ $order->created_at->format('d M Y H:i') }}
                            ┬╖ {{ $order->status }}
                        </small>

                    </a>

                @endforeach

            </div>

        @endif

    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
