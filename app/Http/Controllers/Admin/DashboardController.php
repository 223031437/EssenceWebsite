<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product; 

class DashboardController extends Controller
{
    public function index()
    {
        // Get some basic stats to show on the dashboard
        $totalEmployees = User::where('role', 'employee')->count();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalProducts = Product::count(); 

        return view('admin.dashboard', compact('totalEmployees', 'totalCustomers', 'totalProducts'));
    }
}