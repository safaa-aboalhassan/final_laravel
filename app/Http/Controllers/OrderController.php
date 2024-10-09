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
        $request->validate([
            'order_number' => 'required|string',
            'food' => 'required|integer|exists:food,id',
            'table' => 'required|integer|exists:tables,id',
            'price' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Create the order
        Order::create([
            'order_number' => $request->order_number,
            'food_id' => $request->food,  // Using food (not food_id) to match the form field
            'table_id' => $request->table, // Using table (not table_id) to match the form field
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
    
        // Redirect with a success message
        return redirect()->route('order.index')->with('message', 'Created Successfully!');
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
