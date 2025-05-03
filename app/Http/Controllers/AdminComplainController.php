<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminComplainController extends Controller
{
    // List all complaints
    public function index()
    {
        $complaints = Complaint::with(['user', 'documents','reconsiderationNotes'])->latest()->get();
        return view('admin.components.all_complaints', compact('complaints'));
    }


    public function not_assign()
    {
         Complaint::where('status', Complaint::STATUS_PENDING)
            ->where('created_at', '<', Carbon::now()->subDays(2))
            ->update(['status' => Complaint::STATUS_OVER_DUE]); 

         $complaints = Complaint::with(['user', 'documents'])
            ->where('status', Complaint::STATUS_PENDING)
            ->latest()
            ->get();

        return view('admin.components.not_assign', compact('complaints'));
    }

    public function reconsideration()
    {
        $complaints = Complaint::with(['user', 'documents'])
            ->where('status', Complaint::STATUS_RECONSIDERATION)
            ->latest()
            ->get();

        return view('admin.components.reconsideration', compact('complaints'));
    }


    public function over_due()
    {
        $complaints = Complaint::with(['user', 'documents'])
            ->where('status', Complaint::STATUS_OVER_DUE)
            ->latest()
            ->get()
            ->map(function ($complaint) {
                // Calculate how many days it’s overdue beyond the 2-day limit
                $daysOverdue = Carbon::parse($complaint->created_at)
                    ->addDays(2)
                    ->diffInDays(Carbon::now());

                $complaint->days_overdue = $daysOverdue;

                return $complaint;
            });

        return view('admin.components.over_due', compact('complaints'));
    }
    // Show single complaint details
    public function show(Complaint $complaint)
    {
        $complaint->load(['user', 'documents', 'reconsiderationNotes']);
        return view('admin.components.complaint_details', compact('complaint'));    
    }

    // Assign division to complaint
    public function assignDivision(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'division' => 'required|string|in:Tourist Police,Immigration,Customs,Other',
            'priority' => 'required|in:low,medium,high',
            'notes' => 'nullable|string'
        ]);
    
        $updateData = [
            'division' => $validated['division'],
            'priority' => $validated['priority'],
            'notes' => $validated['notes'] ?? $complaint->notes
        ];
    
        // If this was a reconsideration, change status back to assigned
        if ($complaint->isReconsideration()) {
            $updateData['status'] = Complaint::STATUS_ASSIGNED;
        } elseif ($complaint->isPending()) {
            $updateData['status'] = Complaint::STATUS_ASSIGNED;
        }
    
        $complaint->update($updateData);
    
        return back()->with('success', 'Complaint assigned successfully!');
    }

    // Add note to complaint
    public function addNote(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'note' => 'required|string'
        ]);

        $complaint->update(['notes' => $validated['note']]);
        return back()->with('success', 'Note added successfully!');
    }

    // Mark complaint as resolved
    public function resolveComplaint(Complaint $complaint)
    {
        $complaint->update(['status' => Complaint::STATUS_RESOLVED,'resolved_by' => Auth::user()->name]);
        return back()->with('success', 'Complaint marked as resolved!');
    }

    public function dashboard()
    {

        $dates = [];
        $pendingData = [];
        $closedData = [];
        $inProgressData = [];
        $currentYear = now()->year;

        for ($i = 4; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dates[] = now()->subDays($i)->format('M j');
            
            $pendingData[] = Complaint::where('status', Complaint::STATUS_PENDING)
                ->whereDate('created_at', $date)
                ->count();
                
            $closedData[] = Complaint::where('status', Complaint::STATUS_RESOLVED)
                ->whereDate('created_at', $date)
                ->count();
                
            $inProgressData[] = Complaint::where('status', Complaint::STATUS_ASSIGNED)
                ->whereDate('created_at', $date)
                ->count();
        }

        $divisionStats = Complaint::select('division')->selectRaw('count(*) as total')
        ->whereYear('created_at', $currentYear)
        ->groupBy('division')
        ->orderBy('total', 'desc')
        ->get();

        return view('admin.dashboard', [
            'totalCustomers' => User::where('role', 1)->count(),
            'subOfficers' => User::where('role', 3)->count(),
            'notActionedComplaints' => Complaint::where('status', Complaint::STATUS_PENDING)->count(),
            'overdueComplaints' => Complaint::where('status', Complaint::STATUS_OVER_DUE)->count(),
            'inProcessComplaints' => Complaint::where('status', Complaint::STATUS_ASSIGNED)->count(),
            'closedComplaints' => Complaint::where('status', Complaint::STATUS_RESOLVED)->count(),
            'notAssignedComplaints' => Complaint::whereNull('user_id')->count(),
            'totalComplaints' => Complaint::count(),
            'recentComplaints' => Complaint::with('user')->latest()->take(5)->get(),
            'chartData' => ['dates' => $dates,'pending' => $pendingData,'closed' => $closedData,'inProgress' => $inProgressData],
            'divisionStats' => $divisionStats,
            'currentYear' => $currentYear,
        ]);
    }
}
