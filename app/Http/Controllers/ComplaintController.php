<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintAttachment;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        $complaint = Complaint::with('documents')->findOrFail($id);

        return view('components.show', compact('complaint'));
    }

    public function storeRating(Request $request, $id)
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
