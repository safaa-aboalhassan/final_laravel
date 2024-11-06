<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users,email', // Added email format and uniqueness validation
        'password' => 'required|string|min:8', // Added password minimum length validation
        'is_admin' => 'required|boolean', // Assuming this is a boolean
        'role' => 'required|string',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        // 'password' => Hash::make($request->password), // Hash the password
        'password' => ($request->password),
        'is_admin' => $request->is_admin,
        'role' => $request->role,
    ]);


        return redirect()->route('user.index')->with('message', 'Created Successfully!');
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
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $user->id, // Exclude current user's email
            'password' => 'nullable|string|min:8', // Make password optional
            'is_admin' => 'required|boolean', // Assuming this is a boolean
            'role' => 'required|string',
        ]);
    
        $user->update([
       'name' => $request->name,
        'email' => $request->email,
        // 'password' => Hash::make($request->password), // Hash the password
        'password' => Hash::make($request->password),
        'is_admin' => $request->is_admin,
        'role' => $request->role,
        // Save the user instance
    ]);
    
    
        return redirect()->route('user.index')->with('message', 'Updated Successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        
        return redirect()->route('user.index')->with('message', 'Deleted Successfully!');
    }
}
