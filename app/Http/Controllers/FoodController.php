<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        return view('food.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('food.create',compact('categories'));
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'food_name' => 'required|string',  // Validate form input for food name
            'food_category' => 'required|integer|exists:categories,id',  // Ensure foreign key exists in categories table
            'image' => 'required|image|mimes:jpg,bmp,png,jpeg,jfif',  // Validate image type
            'food_price' => 'required|numeric',  // Validate that the price is numeric
        ]);
        
        // Store the image in 'public/foodimg' directory
        $imagePath = $request->file('image');
        $ext = $imagePath->getClientOriginalExtension();
        $randomName = Str::random(20) . '.' . $ext;
        $imagePath->storeAs('public/foodimg', $randomName);
        
        // Create the food item
        Food::create([
            'name' => $request->food_name,  // Use correct form field for food name
            'category_id' => $request->food_category,  // Use form field food_category and map to category_id column
            'image' => $randomName,  // Store the image filename
            'price' => $request->food_price,  // Use correct form field for food price
        ]);
        
        // Redirect back to the food index page with success message
        return redirect()->route('food.index')->with('message', 'Created Successfully!');
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
    public function edit(Food $food)
    {

        $categories = Category::select('id','name')->get();
        return view('food.edit', compact('food'),compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'string|min:3|unique:categories,name,' . $food->id,
            'food_category' => 'exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,bmp,png,jpeg,jfif',
            'food_price' => 'required|numeric',
        ]);
    
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $ext = $imagePath->getClientOriginalExtension();
            $randomName = Str::random(20) . '.' . $ext;
            $imagePath->storeAs('public/categoryimg', $randomName);
    
           
            if ($food->image) {
                Storage::delete('public/foodimg/' . $food->image);
            }
    
           
            $food->image = $randomName;
        }
    
       
        $food->update([
            'name' => $request->food_name,
            'food_price' => $request->food_price,
            'food_category' =>  $request->food_category,
        ]);
    
      
        return redirect()->route('food.index')->with('message', 'Updated Successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        if ($food->image) {
            Storage::delete('public/foodimg/' . $food->image);
        }
    
       
        $food->delete();
    
        
        return redirect()->route('food.index')->with('message', 'Deleted Successfully!');
    
    }
}
