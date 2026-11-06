@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-gold" style="font-family:'Cormorant Garamond', serif;">Create Employee Account</h1>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-light">Back to List</a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.employees.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-secondary">Full Name</label>
                        <input type="text" name="name" class="form-control bg-dark text-white border-secondary" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-secondary">Email Address</label>
                        <input type="email" name="email" class="form-control bg-dark text-white border-secondary" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-secondary">Temporary Password</label>
                        <input type="password" name="password" class="form-control bg-dark text-white border-secondary" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-secondary">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control bg-dark text-white border-secondary" required>
                    </div>
                    <button type="submit" class="btn btn-gold w-100">Create Employee Account</button>
                </form>
            </div>
        </div>
    </div>
@endsection