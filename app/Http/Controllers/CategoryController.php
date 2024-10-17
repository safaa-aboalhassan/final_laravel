<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Stringable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'category_name' => 'required|string|min:3|unique:categories,name',  // Update the key to match input
        'desc' => 'required|string|min:5',  // Ensure this matches the input name
        'image' => 'required|image|mimes:jpg,bmp,png,jpeg,jfif',
    ]);

    // Store the image in the 'public/categoryimg' directory
    $imagePath = $request->file('image');
    $ext = $imagePath->getClientOriginalExtension();
    $randomName = Str::random(20) . '.' . $ext;
    $imagePath->storeAs('public/categoryimg', $randomName);

    // Create the category
    Category::create([
        'name' => $request->category_name,  // Ensure this matches the validation key
        'description' => $request->desc,  // Ensure this matches the validation key
        'image' => $randomName,
    ]);

    return redirect()->route('category.index')->with('message', 'Created Successfully!');
}

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $category = Category::findOrFail($id);
    return view('category.show', compact('category'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'string|min:3|unique:categories,name,' . $category->id,
            'description' => 'string|min:5',
            'image' => 'nullable|image|mimes:jpg,bmp,png,jpeg,jfif',
        ]);
    
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $ext = $imagePath->getClientOriginalExtension();
            $randomName = Str::random(20) . '.' . $ext;
            $imagePath->storeAs('app/categoryimg', $randomName);
    
           
            if ($category->image) {
                Storage::delete('app/categoryimg/' . $category->image);
            }
    
           
            $category->image = $randomName;
        }
    
       
        $category->update([
            'name' => $request->category_name,
            'description' => $request->desc,
        ]);
    
      
        return redirect()->route('category.index')->with('message', 'Updated Successfully!');
    }
    

    

   
    public function destroy(Category $category)
    {
        
        if ($category->image) {
            Storage::delete('app/categoryimg/' . $category->image);
        }
    
       
        $category->delete();
    
        
        return redirect()->route('category.index')->with('message', 'Deleted Successfully!');
    }
    
 
}
