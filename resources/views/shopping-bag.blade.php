<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Shopping Bag</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
body{background:linear-gradient(to bottom,#050505,#0d0d0d);color:#d3d3d3;font-family:Arial,Helvetica,sans-serif;font-size:16px}h2,h3,h4,h5{color:#d6ae73;font-weight:bold;text-shadow:0 0 8px rgba(214,174,115,.5)}.card{background:linear-gradient(145deg,#1f1f1f,#0d0d0d);border:1px solid #c79a5b;border-radius:15px;box-shadow:0 0 15px rgba(199,154,91,.25);color:#f5f5f5}.btn-checkout,.btn-add{background:#c79a5b;color:#050505;border:none;font-weight:bold}.btn-checkout:hover,.btn-add:hover{background:#d6ae73;color:black}.qty-btn{background:#1f1f1f;color:#d6ae73;border:1px solid #c79a5b;padding:5px 12px;border-radius:5px;font-weight:bold}.qty-btn:hover{background:#c79a5b;color:black}.list-group-item{background:#1f1f1f!important;color:#f5f5f5!important;border:1px solid #c79a5b!important;font-weight:600}#orderTotal,#tax,#grandTotal{color:#d6ae73!important;font-weight:bold;text-shadow:0 0 8px rgba(214,174,115,.5)}:root{--gold:#c79a5b;--soft-gold:#d6ae73;--dark:#050505}.navbar{background:rgba(0,0,0,.6);backdrop-filter:blur(10px);padding:20px 0;border-bottom:1px solid rgba(199,154,91,.3)}.navbar-brand{font-family:'Cormorant Garamond',serif;font-size:1.8rem;letter-spacing:3px;color:var(--soft-gold);font-weight:600}.navbar-brand:hover{color:var(--gold)}.nav-link{color:#d3d3d3;margin-left:20px;transition:.3s;font-weight:500}.nav-link:hover{color:var(--soft-gold)}
  </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
@include('partials.header')
<div class="container py-5">
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
@if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
<h2 class="text-center mb-4">🛍 Shopping Bag – Perfume Catalog</h2>
@if($cartItems->isEmpty())
<div class="card p-5 text-center"><h3>Your shopping bag is empty.</h3><a href="{{ route('catalog') }}" class="btn btn-checkout mt-3">Continue Shopping</a></div>
@else
<div class="row g-4"><div class="col-lg-8"><div class="card p-4">
@foreach($cartItems as $item)
<div class="row align-items-center border-bottom py-3"><div class="col-md-2"><img src="{{ asset('images/'.$item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid"></div><div class="col-md-4"><h5>{{ $item->product->name }}</h5><p class="mb-1">{{ $item->product->category }}</p><p class="mb-0">R{{ number_format($item->product->price,2) }}</p></div><div class="col-md-3"><div class="d-flex align-items-center"><form method="POST" action="{{ route('cart.decrease',$item) }}">@csrf @method('PATCH')<button class="qty-btn" type="submit">-</button></form><span class="mx-3">{{ $item->quantity }}</span><form method="POST" action="{{ route('cart.increase',$item) }}">@csrf @method('PATCH')<button class="qty-btn" type="submit">+</button></form></div></div><div class="col-md-2">R{{ number_format($item->product->price*$item->quantity,2) }}</div><div class="col-md-1"><form method="POST" action="{{ route('cart.remove',$item) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit">×</button></form></div></div>
@endforeach
</div></div><div class="col-lg-4"><div class="card p-4"><h3>Order Summary</h3><p>Subtotal: <span id="orderTotal">R{{ number_format($subtotal,2) }}</span></p><p>Tax (15%): <span id="tax">R{{ number_format($tax,2) }}</span></p><h5>Grand Total: <span id="grandTotal">R{{ number_format($subtotal+$tax,2) }}</span></h5><a href="{{ route('checkout.index') }}" class="btn btn-checkout mt-3 w-100">Checkout</a></div></div></div>
@endif
</div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>@include('partials.footer')

</body></html>
