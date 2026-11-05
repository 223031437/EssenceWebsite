@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-gold" style="font-family:'Cormorant Garamond', serif;">Manage Employees</h1>
        <a href="{{ route('admin.employees.create') }}" class="btn btn-gold">Add Employee</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $emp)
                        <tr>
                            <td class="ps-4">{{ $emp->name }}</td>
                            <td>{{ $emp->email }}</td>
                            <td>{{ $emp->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($emp->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.employees.toggle', $emp->id) }}" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $emp->is_active ? 'btn-outline-danger' : 'btn-outline-success' }}">
                                        {{ $emp->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-4">No employees found. Add one above.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection