<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function search_user()
    {

        return view('admin.components.search_user');

    }
    public function search(Request $request)
{
    $query = User::query();
    
    if ($request->name) {
        $query->where('name', 'like', '%'.$request->name.'%');
    }
    
    if ($request->email) {
        $query->where('email', 'like', '%'.$request->email.'%');
    }
    
    if ($request->status) {
        if ($request->status == 'Active') {
            $query->where('active', true);
        } elseif ($request->status == 'Inactive') {
            $query->where('active', false);
        } elseif ($request->status == 'Banned') {
            $query->where('banned', true);
        }
    }
    
    $users = $query->paginate(15);
    
    return view('admin.components.search_user', compact('users'));
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
    public function show(User $user)
    {
        return view('admin.components.user_show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.components.user_edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'status' => 'required|in:active,inactive,banned',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.search')
                         ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.search')
                         ->with('success', 'User deleted successfully');
    }
}
