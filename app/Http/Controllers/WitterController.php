<?php

namespace App\Http\Controllers;

use App\Models\Witter;
use Illuminate\Http\Request;

class WitterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $witters= Witter::all();
        return view('witter.index',compact('witters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('witter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'witter_name' => 'required|string|min:3',
        'witter_phone' => 'required|string|max:10',
        'witter_salary' => 'required|string',
    ]);

    Witter::create([
        'name' => $request->witter_name,
        'phone' => $request->witter_phone,
        'salary' => $request->witter_salary,
    ]);

    return redirect()->route('witter.index')->with('message', 'Created Successfully!');
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
    public function edit(Witter $witter)
    {
        return view('witter.edit',compact('witter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Witter $witter)
    {
        $request->validate([
        'witter_name' => 'string|min:3',
        'witter_phone' => 'string|max:10',
        'witter_salary' => 'string',
        ]);
        $witter->update([
            'name' => $request->witter_name,
            'phone' => $request->witter_phone,
            'salary' =>  $request->witter_salary,
           
        ]);
    
      
        return redirect()->route('witter.index')->with('message', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Witter $witter)
    {
        $witter->delete();
    
        
        return redirect()->route('witter.index')->with('message', 'Deleted Successfully!');
    }
}
