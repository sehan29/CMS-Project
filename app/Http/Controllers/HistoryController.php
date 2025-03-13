<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Documents;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function index()
    {
        /* return view('components.history'); */

                // Fetch all complaints with their attachments
                $complaints = Complaint::where('user_id', auth()->id())->latest()->get();

                foreach ($complaints as $complaint) {
                    $attachments = Documents::where('complaint_id', $complaint->id)->pluck('file_path');
                    $complaint->attachments = $attachments;
                }
                /* dd($complaints); */

                return view('components.history', compact('complaints'));
    }
}
