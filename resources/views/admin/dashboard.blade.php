@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-gold" style="font-family:'Cormorant Garamond', serif;">Dashboard Overview</h1>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card text-center p-4">
                <h5 class="text-secondary">Total Customers</h5>
                <h2 class="text-white">{{ $totalCustomers }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-4">
                <h5 class="text-secondary">Total Employees</h5>
                <h2 class="text-white">{{ $totalEmployees }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-4">
                <h5 class="text-secondary">Total Products</h5>
                <h2 class="text-white">{{ $totalProducts }}</h2>
            </div>
        </div>
    </div>

    <div class="card p-4">
        <h4 class="text-gold mb-3">Quick Actions</h4>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.employees.create') }}" class="btn btn-gold">Add New Employee</a>
            <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-warning">Manage Employees</a>
        </div>
    </div>
@endsection