<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComplaintReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
/*     public function index()
    {
        //

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $totalComplaint = Complaint::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();

        $notAssigned = Complaint::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'not_assigned')
            ->count();

        $inProgress = Complaint::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'in_progress')
            ->count();

        $closed = Complaint::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'closed')
            ->count();

        return view('admin.components.complaint_report', compact('totalComplaint', 'notAssigned', 'inProgress', 'closed'));
    } */

    public function index()
    {
        // Current month statistics
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $stats = [
            'total' => Complaint::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->count(),
            'not_assigned' => Complaint::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('status', Complaint::STATUS_PENDING)
                ->count(),
            'in_progress' => Complaint::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('status', Complaint::STATUS_ASSIGNED)
                ->count(),
            'closed' => Complaint::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('status', Complaint::STATUS_RESOLVED)
                ->count(),
            'reconsider' => Complaint::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('status', Complaint::STATUS_RECONSIDERATION)
                ->count(),
        ];

        // Get monthly reports data
        $reports = $this->getMonthlyReports();

        return view('admin.components.complaint_report', compact('stats', 'reports'));
    }

    protected function getMonthlyReports()
    {
        $months = [];
        $reports = [];
        
        for ($i = 0; $i < 12; $i++) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->format('F');
            $year = $date->year;
            $startOfMonth = $date->copy()->startOfMonth();
            $endOfMonth = $date->copy()->endOfMonth();
            
            $complaints = Complaint::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
            
            if ($complaints->count() > 0) {
                $totalComplaints = $complaints->count();
                $closedComplaints = $complaints->where('status', Complaint::STATUS_RESOLVED)->count();
                
                $divisionCounts = $complaints->groupBy('division')
                ->map->count()
                ->sort();
            
            // Get quiet division (with fewest complaints)
            $quietDivision = $divisionCounts->count() > 0 
                ? $divisionCounts->keys()->first() 
                : 'N/A';
                
                $majorDivision = $complaints->groupBy('division')
                    ->sortByDesc(function ($group) {
                        return $group->count();
                    })
                    ->keys()
                    ->first();
                
                $averageRating = $complaints->avg('rating') ?? 0;
                
                $reports[] = [
                    'month' => $month . ' ' . $year,
                    'total_complaints' => $totalComplaints,
                    'closed_complaints' => $closedComplaints,
                    'quiet_division' => $quietDivision,
                    'major_division' => $majorDivision,
                    'average_rating' => number_format($averageRating, 1) . '/5',
                    'year' => $year,
                    'month_num' => $date->month,
                ];
            }
        }
        
        // Sort reports by year and month (newest first)
        usort($reports, function ($a, $b) {
            return $b['year'] <=> $a['year'] ?: $b['month_num'] <=> $a['month_num'];
        });
        
        // Add sequential numbers
        foreach ($reports as $index => &$report) {
            $report['no'] = $index + 1;
        }
        
        return $reports;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function report(Request $request)
    {
        $month = $request->input('month');

        // Parse the month (format: "April 2025")
        try {
            $monthYear = \Carbon\Carbon::parse($month);
            $startDate = $monthYear->startOfMonth()->toDateTimeString();
            $endDate = $monthYear->endOfMonth()->toDateTimeString();
            
            // Get all complaints for this month
            $complaints = Complaint::whereBetween('created_at', [$startDate, $endDate])
                ->with('user')
                ->get();
                
            // Get statistics for this month
            $stats = [
                'total' => $complaints->count(),
                'closed' => $complaints->where('status', Complaint::STATUS_RESOLVED)->count(),
                'in_progress' => $complaints->where('status', Complaint::STATUS_ASSIGNED)->count(),
                'not_assigned' => $complaints->where('status', Complaint::STATUS_PENDING)->count(),
                'reconsider' => $complaints->where('status', Complaint::STATUS_RECONSIDERATION)->count(),
                'overdue' => $complaints->where('status', Complaint::STATUS_OVER_DUE)->count(),
            ];
            
            // Group by division
            $divisions = $complaints->groupBy('division')->map->count();
            
            return view('admin.components.detail_complaint_report', compact('month', 'complaints', 'stats', 'divisions'));
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid month format');
        }
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
