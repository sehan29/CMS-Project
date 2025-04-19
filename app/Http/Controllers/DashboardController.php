<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Support\Facades\Auth; // Add this at the top
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        // Remove the dd($user) - it was preventing the view from rendering
        // dd($user);
        
        // Initialize default data array
        $data = [
            'totalComplaints' => 0,
            'pendingComplaints' => 0,
            'inProcessComplaints' => 0,
            'resolvedComplaints' => 0,
            'recentComplaints' => collect() // Empty collection
        ];
        
        // For customers (assuming role 1 is customer)
        if ($user->role == 1) {
            $data = [
                'totalComplaints' => Complaint::where('user_id', $user->id)->count(),
                'pendingComplaints' => Complaint::where('user_id', $user->id)
                    ->where('status', Complaint::STATUS_PENDING)
                    ->count(),
                'inProcessComplaints' => Complaint::where('user_id', $user->id)
                    ->where('status', Complaint::STATUS_ASSIGNED)
                    ->count(),
                'resolvedComplaints' => Complaint::where('user_id', $user->id)
                    ->where('status', Complaint::STATUS_RESOLVED)
                    ->count(),
                'recentComplaints' => Complaint::where('user_id', $user->id)
                    ->latest()
                    ->take(5)
                    ->get()
            ];
        }
        
        return view('dashboard', $data);
        
    }
}
