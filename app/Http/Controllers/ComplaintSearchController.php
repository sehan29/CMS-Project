<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ComplaintSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.components.search_complaint');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function search(Request $request)
    {
        $query = Complaint::with('user')->latest();
        
        // Search by complaint ID
        if ($request->complaint_id) {
            $query->where('id', $request->complaint_id);
        }
        
        // Search by user ID
        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }
        
        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }
        
        // Filter by date range
        if ($request->date_range) {
            $now = Carbon::now();
            
            switch ($request->date_range) {
                case 'today':
                    $query->whereDate('created_at', $now->toDateString());
                    break;
                    
                case 'this_week':
                    $query->whereBetween('created_at', [
                        $now->startOfWeek()->toDateTimeString(),
                        $now->endOfWeek()->toDateTimeString()
                    ]);
                    break;
                    
                case 'this_month':
                    $query->whereMonth('created_at', $now->month)
                          ->whereYear('created_at', $now->year);
                    break;
                    
                case 'last_month':
                    $query->whereMonth('created_at', $now->subMonth()->month)
                          ->whereYear('created_at', $now->year);
                    break;
                    
                case 'custom':
                    if ($request->from_date && $request->to_date) {
                        $query->whereBetween('created_at', [
                            Carbon::parse($request->from_date)->startOfDay(),
                            Carbon::parse($request->to_date)->endOfDay()
                        ]);
                    }
                    break;
            }
        }
        
        $complaints = $query->paginate(15);
        
        return view('admin.components.search_complaint', compact('complaints'));
    }

    /**
     * Show complaint details
     */
    public function show(Complaint $complaint)
    {
        return view('admin.components.complaint_del', compact('complaint'));
    }

    /**
     * Edit complaint
     */
    public function edit(Complaint $complaint)
    {
        return view('admin.components.complaint_edit', compact('complaint'));
    }

    /**
     * Update complaint
     */
    public function update(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,resolved,rejected',
            'admin_notes' => 'nullable|string|max:1000'
        ]);
        
        $complaint->update($validated);
        
        return redirect()->route('admin.complaints.search')
                         ->with('success', 'Complaint updated successfully');
    }
}
