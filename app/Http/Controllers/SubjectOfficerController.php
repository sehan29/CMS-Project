<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SubjectOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Get users with role 3 (Subject Officers)
        $subjectOfficers = User::where('role', 3)->get();
        return view('admin.components.sub_officer', compact('subjectOfficers'));
    }


    public function searchUser(Request $request)
    {
        $nicPassport = $request->input('nic_passport');        
        $user = User::where('nic_passport', $nicPassport)->first();
        
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ]);
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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'section' => 'required|string'
        ]);

        $user = User::find($request->user_id);
        $user->role = 3; // Subject Officer role
        $user->section = $request->section;
        $user->save();

        return redirect()->back()->with('success', 'Subject Officer assigned successfully');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'section' => 'required|string'
        ]);

        $user = User::findOrFail($id);
        $user->section = $request->section;
        $user->save();

        return redirect()->back()->with('success', 'Subject Officer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->role = 1; // Reset to default role
        $user->section = null;
        $user->save();

        return redirect()->back()->with('success', 'Subject Officer removed successfully');
    }
}
