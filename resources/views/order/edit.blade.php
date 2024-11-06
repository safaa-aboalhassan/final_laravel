@extends('layouts.app')

@section('body')
    <h1>Edit Order</h1>

    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('order.update', ['order' => $order->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="col-md-4">
            <label for="food" class="form-label">Food</label>
            <select class="form-select" id="food" name="food_id">
                <option value="" disabled selected>Select food</option>
        
                @foreach ($foods as $food)
                    <option value="{{ $food->id }}" {{ (old('food_id') ?? $order->food_id) == $food->id ? 'selected' : '' }}>
                        {{ $food->name }}
                    </option>
                @endforeach
            </select>
        
            @error('food_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
    

        <div class="col-md-4">
            <label for="table" class="form-label">Table</label>
            <select class="form-select" id="table" name="table_id"> 
                <option value="" disabled selected>Select table</option>
                
                @foreach ($tables as $table)
                    <option {{ (old('table_id') ?? $order->table_id) == $table->id ? 'selected' : '' }} value="{{ $table->id }}">
                        {{ $table->number }}
                    </option>
                @endforeach
            </select>
            @error('table_id') 
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-md-1">
            <label for="quantityName" class="form-label">Quantity</label>
            <input type="number" value="{{ old('quantity') ?? $order->quantity }}" class="form-control" id="quantityName" name="quantity"> <!-- Changed name to quantity -->
            @error('quantity')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary m-lg-2">Update Order</button> 
    </form>
@endsection
