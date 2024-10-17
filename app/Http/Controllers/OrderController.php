<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $foods = Food::select('id', 'name')->get();
        $tables = Table::select('id','number')->get();
        return view('order.create', ['foods' => $foods,'tables' => $tables]);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'food_id' => 'required|exists:food,id', 
            'table' => 'required|integer|exists:tables,id', 
            'quantity' => 'required|integer|min:1', 
        ]);
    
        
        $food = Food::find($validated['food_id']);
        $totalPrice = $food->price * $validated['quantity'];
    
        // Create the new order
        $order = Order::create([
            'food_id' => $food->id, 
            'table_id' => $validated['table'], 
            'quantity' => $validated['quantity'], 
            'total_price' => $totalPrice,
        ]);
    
        // Redirect with a success message
        return redirect()->route('order.index')->with('message', 'Order Created Successfully!');
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
