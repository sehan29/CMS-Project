<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends Controller
{
    public function print()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        $data = ['name' => 'Sehan',"email" => 'sehan@gmail.com'];
        $html = view('pdf_template', $data)->render(); // your Blade view

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return response($dompdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="my-pdf.pdf"');
    }

    public function printMonthlyReport(Request $request)
    {
        $month = $request->input('month');

        try {
            $monthYear = Carbon::parse($month);
            $startDate = $monthYear->startOfMonth()->toDateTimeString();
            $endDate = $monthYear->endOfMonth()->toDateTimeString();
            
            $complaints = Complaint::whereBetween('created_at', [$startDate, $endDate])
                ->with('user')
                ->get();
                
            $stats = [
                'total' => $complaints->count(),
                'closed' => $complaints->where('status', Complaint::STATUS_RESOLVED)->count(),
                'in_progress' => $complaints->where('status', Complaint::STATUS_ASSIGNED)->count(),
                'not_assigned' => $complaints->where('status', Complaint::STATUS_PENDING)->count(),
                'reconsider' => $complaints->where('status', Complaint::STATUS_RECONSIDERATION)->count(),
                'overdue' => $complaints->where('status', Complaint::STATUS_OVER_DUE)->count(),
            ];
            
            $divisions = $complaints->groupBy('division')->map->count();
            
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $options->set('isRemoteEnabled', true);


            $dompdf = new Dompdf($options);
            $html = view('pdf_template', compact('month', 'complaints', 'stats', 'divisions'))->render();
            
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait'); // Landscape for better table view
            $dompdf->render();

            $filename = "complaints-report-".$monthYear->format('F-Y').".pdf";
            
            return response($dompdf->output(), 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="'.$filename.'"');
                
        } catch (\Exception $e) {
            abort(404, 'Invalid month format');
        }
    }
}
