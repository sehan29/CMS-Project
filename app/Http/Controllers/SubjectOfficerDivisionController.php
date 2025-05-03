<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SubjectOfficerDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function all_complaint()
    {

        $userSection = Auth::user()->section;

        $complaints = Complaint::with(['user', 'documents', 'reconsiderationNotes'])
            ->where('division', $userSection)
            ->latest()
            ->get();
    
/*         return view('admin.components.all_complaints', compact('complaints'));
 */
        return view('sub_officer.components.all_complaints',compact('complaints'));
    }

    public function over_complaint()
    {

        Complaint::where('status', Complaint::STATUS_ASSIGNED)
        ->where('updated_at', '<', Carbon::now()->subDays(5))
        ->update(['status' => Complaint::STATUS_OVER_DUE]); 

        $complaints = Complaint::with(['user', 'documents'])
            ->where('status', Complaint::STATUS_OVER_DUE)
            ->latest()
            ->get()
            ->map(function ($complaint) {
                // Calculate how many days it’s overdue beyond the 2-day limit
                $daysOverdue = Carbon::parse($complaint->created_at)
                    ->addDays(5)
                    ->diffInDays(Carbon::now());

                $complaint->days_overdue = $daysOverdue;

                return $complaint;
            });

        return view('sub_officer.components.over_due_complaints', compact('complaints'));

    }

    public function reconsideration_complaint()
    {

        $userSection = Auth::user()->section;

        $complaints = Complaint::with(['user', 'documents'])
        ->where('status', Complaint::STATUS_RECONSIDERATION)
        ->where('division', $userSection)
        ->latest()
        ->get();

        return view('sub_officer.components.reconsideration', compact('complaints'));

/*         return view('sub_officer.components.reconsideration');
 */    }


    public function closed_complaint()
    {

        $userSection = Auth::user()->section;

        $complaints = Complaint::with(['user', 'documents'])
        ->where('status', Complaint::STATUS_RESOLVED)
        ->where('division', $userSection)
        ->latest()
        ->get();

        return view('sub_officer.components.closed_complaints', compact('complaints'));

/*         return view('sub_officer.components.closed_complaints');
 */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
