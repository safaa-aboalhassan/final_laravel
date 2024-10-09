@extends('layouts.app')

@section('body')
    <h1>Edit food</h1>

    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('food.update', ['food' => $food->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="foodname" class="form-label">Food Name</label>
            <input type="text" value="{{ old('food_name') ?? $food->name }}" class="form-control" id="foodname" name="food_name">
        </div>

        <div class="col-md-6">
            <label for="food" class="form-label">Food Category</label>
            <select class="form-select" id="food" name="food_category">
                @foreach ($categories as $category)
                    <option 
                        value="{{ $category->id }}" 
                        {{ (old('food_category') ?? $food->food_category) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        
            @error('food_category')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        

        <div class="mb-3">
            <label for="price" class="form-label">Food Price</label>
            <input type="text" value="{{ old('food_price') ?? $food->price }}" class="form-control" id="price" name="food_price">
            @error('food_price')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Food Image</label>
            <input id="image" type="file" value="{{ old('image') }}" class="form-control" name="image">
            
            <!-- Show the current image -->
            @if($food->image)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" width="150">
                </div>
            @endif
        </div>
        
        <button type="submit" class="btn-primary btn">Update Data</button>
    </form>
@endsection
