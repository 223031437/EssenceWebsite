<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Essence of the Middle East</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background-color: #050505; color: #d3d3d3; font-family: 'Poppins', sans-serif; min-height: 100vh; display: flex; flex-direction: column; }
        .admin-sidebar { background: #0d0d0d; border-right: 1px solid #333; min-height: 100vh; padding-top: 20px; }
        .admin-nav-link { color: #999; text-decoration: none; padding: 12px 20px; display: block; transition: 0.3s; }
        .admin-nav-link:hover, .admin-nav-link.active { color: #d6ae73; background: #1a1a1a; border-left: 3px solid #d6ae73; }
        .admin-content { padding: 40px; flex-grow: 1; }
        .card { background: #121212; border: 1px solid #333; border-radius: 8px; }
        .text-gold { color: #d6ae73; }
        .btn-gold { background: #c79a5b; color: #050505; font-weight: 600; }
        .btn-gold:hover { background: #d6ae73; color: #000; }
        .table-dark { --bs-table-bg: transparent; }
    </style>
</head>
<body>

    <!-- Admin Top Bar -->
    <nav class="navbar navbar-dark bg-dark border-bottom border-secondary px-4">
        <a class="navbar-brand text-gold" href="{{ route('admin.dashboard') }}" style="font-family:'Cormorant Garamond', serif; font-size: 1.5rem;">
            Essence Admin
        </a>
        <div class="d-flex align-items-center">
            <span class="text-secondary me-3">Logged in as: {{ auth()->user()->name }}</span>
            <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm me-2">View Site</a>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="admin-sidebar d-none d-md-block" style="width: 250px;">
            
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge me-2"></i> Admin Dashboard
                </a>
                <a href="{{ route('admin.employees.index') }}" class="admin-nav-link {{ request()->routeIs('admin.employees.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users me-2"></i> Manage Employees
                </a>
                <a href="{{ route('admin.products.index') }}" class="admin-nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-bottle-droplet me-2"></i> Manage Products
                </a>
                <a href="{{ route('admin.orders.index') }}" class="admin-nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-truck-fast me-2"></i> Manage Orders
                </a>
            @endif

            @if(auth()->user()->role === 'employee')
                <a href="{{ route('staff.dashboard') }}" class="admin-nav-link {{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-boxes-stacked me-2"></i> Stock Management
                </a>
                <a href="{{ route('staff.orders') }}" class="admin-nav-link {{ request()->routeIs('staff.orders') ? 'active' : '' }}">
                    <i class="fa-solid fa-box me-2"></i> View Orders
                </a>
            @endif
        </div>

        <!-- Main Content Area -->
        <div class="admin-content w-100">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>