<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintAttachment;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;


class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validate the request
        $validator = Validator::make($request->all(), [
            'category' => 'required|string',
            'details' => 'required|string',
            'attachments' => 'array',
            'attachments.*' => 'string', // File paths stored as strings
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        /* dd(Auth()->users->id); */
        // Store complaint in the database
        $complaint = Complaint::create([
            'user_id' => auth()->id(), // Assuming a logged-in user
            'category' => $request->category,
            'details' => $request->details,
        ]);

        // Save attachments if available
        if ($request->has('attachments')) {
            foreach ($request->attachments as $filePath) {
                Documents::create([
                    'complaint_id' => $complaint->id,
                    'file_path' => $filePath,
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Complaint submitted successfully!', 'data' => $complaint]);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('complaints', 'public'); // Stores in storage/app/public/complaints

            return response()->json(['success' => true, 'file_path' => $path]);
        }
        return response()->json(['success' => false, 'message' => 'File upload failed.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $complaint = Complaint::with('documents', 'user')->findOrFail($id);
        
        // Ensure only the complaint owner or admin can view
/*         if (auth()->id() !== $complaint->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        } */
    
        return view('components.show', compact('complaint'));
    }

    /*     public function storeRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $complaint = Complaint::findOrFail($id);

        // Ensure only the complaint owner can rate
        if ($complaint->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized to rate this complaint.');
        }

        $complaint->update(['rating' => $request->rating]);

        return back()->with('success', 'Rating submitted successfully.');
    } */


    // Add these methods to your ComplaintController

    public function requestReconsideration(Request $request, $id)
    {
        $request->validate([
            'feedback' => 'required|string|min:5|max:1000',
        ]);
    
        $complaint = Complaint::findOrFail($id);
        
        // Check if user can request reconsideration
        if (!$complaint->can_reconsider) {
            return back()->with('error', 'You cannot request reconsideration for this complaint.');
        }
    
        // Create a new reconsideration note
        $complaint->reconsiderationNotes()->create([
            'notes' => $request->feedback,
            'request_number' => $complaint->reconsideration_count + 1
        ]);
    
        $complaint->update([
            'reconsideration_count' => $complaint->reconsideration_count + 1,
            'feedback' => $request->feedback,
            'status' => Complaint::STATUS_RECONSIDERATION,
        ]);
    
        return redirect()->back()->with('success', 'Reconsideration request submitted successfully. We will review your complaint again.');
    }

    public function storeRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:1000',
        ]);
    
        $complaint = Complaint::findOrFail($id);
    
        // Ensure only the complaint owner can rate
        if ($complaint->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized to rate this complaint.');
        }
    
        // Only allow rating if complaint is resolved
        if (!$complaint->isResolved()) {
            return back()->with('error', 'You can only rate resolved complaints.');
        }
    
        // Check if already rated
        if ($complaint->rating) {
            return back()->with('error', 'You have already rated this complaint.');
        }
    
        $complaint->update([
            'rating' => $request->rating,
            'feedback' => $request->feedback
        ]);
    
        return redirect()->back()->with('success', 'Thank you for your rating and feedback!');
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


    public function assign(Request $request, Complaint $complaint)
    {
        $request->validate([
            'division' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'notes' => 'nullable|string'
        ]);

        $complaint->update([
            'division' => $request->division,
            'priority' => $request->priority,
            'notes' => $request->notes,
            'status' => 1, // Assigned
            'assigned_at' => now()
        ]);

        // Log activity
        /*        activity()
            ->performedOn($complaint)
            ->causedBy(auth()->user())
            ->log('Assigned complaint to ' . $request->division . ' division'); */

        return redirect()->back()->with('success', 'Complaint assigned to division successfully');
    }

    public function resolve(Complaint $complaint)
    {
        $complaint->update([
            'status' => 2, // Resolved
            'resolved_at' => now()
        ]);

        // Log activity
        /*         activity()
            ->performedOn($complaint)
            ->causedBy(auth()->user())
            ->log('Marked complaint as resolved');
 */
        return redirect()->back()->with('success', 'Complaint marked as resolved');
    }

    public function addNote(Request $request, Complaint $complaint)
    {
        $request->validate([
            'note' => 'required|string'
        ]);

        $complaint->update([
            'notes' => $request->note
        ]);

        // Log activity
        /*         activity()
            ->performedOn($complaint)
            ->causedBy(auth()->user())
            ->log('Added note to complaint'); */

        return redirect()->back()->with('success', 'Note added successfully');
    }
}
