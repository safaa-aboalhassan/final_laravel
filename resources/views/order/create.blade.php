@extends('layouts.app')

@section('body')
    <h1>Create New Order</h1>

    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-md-4">
            <label for="food" class="form-label">Food</label>
            <select class="form-select" id="food" name="food_id"> 
                <option value="" disabled selected>Select food</option> 

                @foreach ($foods as $food)
                    <option {{ old('food_id') == $food->id ? 'selected' : '' }} value="{{ $food->id }}">
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
            <select class="form-select" id="table" name="table">
                <option value="" disabled selected>Select table</option> <!-- Fixed option -->
                
                @foreach ($tables as $table)
                    <option {{ old('table') == $table->id ? 'selected' : '' }} value="{{ $table->id }}">
                        {{ $table->number }}
                    </option>
                @endforeach
            </select>
            @error('table')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-md-1">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" value="{{ old('quantity') }}" class="form-control" id="quantity" name="quantity" min="1"> 
            @error('quantity')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
