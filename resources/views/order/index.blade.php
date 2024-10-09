@extends('layouts.app')


@section('body')
    <h1>order Info.</h1>

    <x-operation.success />
    
    <div class="my-3">
        <a href="{{route('order.create')}}" class="btn btn-primary">Create New order</a>
    </div>
    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>order number</th>
                    <th> table</th>
                    <th> food</th>
                    <th> quantity</th>
                    <th> price</th>
                    <th>Create at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->food_id}}</td>
                        <td>{{$order->table_id}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->created_at->format('d M Y , h:i A')}}</td>
                        <td>
                            <a href="{{ route('order.show',['order'=>$order->id]) }}">Show</a>
                            <a href="{{ route('order.edit',['order'=>$order->id]) }}" class="text-warning">update</a>
                            <form  action="{{ route('order.destroy',['order'=>$order->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
            
        </table>

        {{-- <div class="mt-3">
            {{$categories->render()}}
        </div> --}}
    </div>
@endsection