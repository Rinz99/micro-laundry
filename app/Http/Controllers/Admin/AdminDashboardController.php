<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $admin = auth()->user();
        $totalCustomers = User::where('role', 'customer')->count();

        $stats = [
            'total_customers' => $totalCustomers,
            'active_orders' => 12,
            'pending_pickups' => 4,
            'completed_today' => 18,
            'estimated_revenue' => 'Rp 845.000',
        ];

        return view('admin.dashboard', compact('admin', 'stats'));
    }
}
