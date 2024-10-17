@extends('layouts.app')

@section('body')
    <h1>Order Info</h1>

    <x-operation.success />

    <div class="my-3">
        <a href="{{ route('order.create') }}" class="btn btn-primary">Create New Order</a>
    </div>
    
    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Number</th>
                    <th>Table</th>
                    <th>Food</th>
                    <th>Quantity</th>
                    <th>Price per Item</th>
                    <th>Total Price</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->table->number }}</td> <!-- Display table number -->
                        <td>{{ $order->food->name }}</td> <!-- Display food name -->
                        <td>{{ $order->quantity }}</td>
                        <td>${{ $order->food->price }}</td> <!-- Format price with $ -->
                        <td>${{ $order->total_price  }}</td> <!-- Format total price -->
                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <a href="{{ route('order.edit', ['order' => $order->id]) }}" class="btn btn-warning">Update</a>
                            <form action="{{ route('order.destroy', ['order' => $order->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit" aria-label="Delete Order">confirm</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination (if needed) --}}
        {{-- <div class="mt-3">
            {{ $orders->links() }}
        </div> --}}
    </div>
@endsection
