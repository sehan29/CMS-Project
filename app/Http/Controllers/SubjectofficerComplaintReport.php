<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SubjectofficerComplaintReport extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function sub_complaints()
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
