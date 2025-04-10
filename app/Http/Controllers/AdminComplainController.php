<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminComplainController extends Controller
{
    // List all complaints
    public function index()
    {
        $complaints = Complaint::with(['user', 'documents'])->latest()->get();
        return view('admin.components.all_complaints', compact('complaints'));
    }


    public function not_assign()
    {
        // Update complaints older than 2 days to status = 4 (Over Due)
        Complaint::where('status', Complaint::STATUS_PENDING)
            ->where('created_at', '<', Carbon::now()->subDays(2))
            ->update(['status' => Complaint::STATUS_OVER_DUE]); // STATUS_OVERDUE

        // Now get the current pending complaints (still within 2 days)
        $complaints = Complaint::with(['user', 'documents'])
            ->where('status', Complaint::STATUS_PENDING)
            ->latest()
            ->get();

        return view('admin.components.not_assign', compact('complaints'));
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

        $complaint->update([
            'division' => $validated['division'],
            'priority' => $validated['priority'],
            'status' => Complaint::STATUS_ASSIGNED,
            'notes' => $validated['notes'] ?? $complaint->notes
        ]);

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
        $complaint->update(['status' => Complaint::STATUS_RESOLVED]);
        return back()->with('success', 'Complaint marked as resolved!');
    }
}
