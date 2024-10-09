<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs= Chef::all();
        return view('chef.index',compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('chef.create',compact('categories'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|min:3',
            'phone' => 'required|string|max:10',
            'salary' => 'required|string',
            'chef_category' => 'required|integer|exists:categories,id', // Category validation
        ]);
    
        // Create the chef
        Chef::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'category_id' => $request->chef_category, // Save as 'category_id' in the DB
        ]);
    
        // Redirect with success message
        return redirect()->route('chef.index')->with('message', 'Created Successfully!');
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
    public function edit(Chef $chef)
    {
        $categories = Category::select('id','name')->get();
        return view('chef.edit', compact('chef'),compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chef $chef)
    {
        $request->validate([
            'name' => 'string|min:3,' . $chef->id,
            'category_id' => 'exists:categories,id',
            'phone' => 'string|max:10',
            'salary' => 'string',
        ]);
        $chef->update([
            'name' => $request->name,
            'category_id' => $request->chef_category,
            'phone' =>  $request->phone,
            'salary' =>  $request->salary,
        ]);
    
      
        return redirect()->route('chef.index')->with('message', 'Updated Successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        
        $chef->delete();
    
        
        return redirect()->route('chef.index')->with('message', 'Deleted Successfully!');
    }
}
