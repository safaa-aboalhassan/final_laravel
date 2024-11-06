<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::all();
        return view('order.index',compact('orders'));
    }

   
    public function create()
    {
        $foods = Food::select('id', 'name')->get();
        $tables = Table::select('id','number')->get();
        return view('order.create', ['foods' => $foods,'tables' => $tables]);
       
    }

   
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
    
        
        return redirect()->route('order.index')->with('message', 'Order Created Successfully!');
    }
    
    
    

   
    public function show(string $id)
    {
        //
    }

    
    public function edit(Order $order)
{
    $tables = Table::select('id', 'number')->get(); // Added 'id' since you need it for the form
    $foods = Food::select('id', 'name')->get();
    
    return view('order.edit', compact('order', 'foods', 'tables'));
}


    
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'food_id' => 'required|exists:food,id', 
            'table_id' => 'required|integer|exists:tables,id', // Changed to table_id
            'quantity' => 'required|integer|min:1', 
        ]);
    
        $food = Food::find($validated['food_id']);
        $totalPrice = $food->price * $validated['quantity']; // Calculate total price
    
        $order->update([
            'food_id' => $validated['food_id'], // Use $validated instead of $request
            'table_id' => $validated['table_id'], // Use table_id
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice, // Use calculated totalPrice
        ]);
    
        return redirect()->route('order.index')->with('message', 'Updated Successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
    
        
        return redirect()->route('order.index')->with('message', 'confirmed Successfully!');
    }
}
