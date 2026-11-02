<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Essence of the Middle East</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body{background:linear-gradient(to bottom,#050505,#0d0d0d);color:#d3d3d3;font-family:'Poppins',sans-serif;min-height:100vh}
        .profile-wrap{padding:70px 0}
        .profile-card{background:linear-gradient(145deg,#1f1f1f,#0d0d0d);border:1px solid #c79a5b;border-radius:15px;box-shadow:0 0 15px rgba(199,154,91,.20)}
        .profile-icon{width:90px;height:90px;border:1px solid #c79a5b;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#d6ae73;font-size:2.3rem;margin:0 auto 20px}
        h1,h2{font-family:'Cormorant Garamond',serif;color:#d6ae73}
        .info-row{padding:17px 0;border-bottom:1px solid #2a2a2a}
        .info-label{color:#888;text-transform:uppercase;letter-spacing:1.5px;font-size:.75rem}
        .info-value{color:#fff}
        .role-badge{border:1px solid #c79a5b;color:#d6ae73;padding:5px 12px;border-radius:20px;font-size:.75rem;text-transform:uppercase;letter-spacing:1px}
        .btn-gold{background:#c79a5b;color:#050505;border:none;font-weight:600}
        .btn-gold:hover{background:#d6ae73;color:#000}
    </style>
</head>
<body>
@include('partials.header')

<section class="profile-wrap">
    <div class="container">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="profile-card p-4 p-md-5">
                    <div class="text-center">
                        <div class="profile-icon"><i class="fa-regular fa-user"></i></div>
                        <h1 class="mb-1">My Profile</h1>
                        <p class="text-secondary">Your account information</p>
                        <span class="role-badge">{{ $user->role }}</span>
                    </div>
                    <div class="mt-4">
                        <div class="info-row"><div class="info-label">Full Name</div><div class="info-value mt-1">{{ $user->name }}</div></div>
                        <div class="info-row"><div class="info-label">Email Address</div><div class="info-value mt-1">{{ $user->email }}</div></div>
                        <div class="info-row"><div class="info-label">Account Type</div><div class="info-value mt-1">{{ ucfirst($user->role) }}</div></div>
                        <div class="info-row"><div class="info-label">Member Since</div><div class="info-value mt-1">{{ optional($user->created_at)->format('d F Y') }}</div></div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 flex-wrap">
                        <a href="{{ route('orders.index') }}" class="btn btn-gold">My Orders</a>
                        <a href="{{ route('catalog') }}" class="btn btn-outline-light">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
