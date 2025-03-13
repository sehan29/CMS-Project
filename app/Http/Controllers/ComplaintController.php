<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintAttachment;
use App\Models\Documents;
use Illuminate\Http\Request;
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
