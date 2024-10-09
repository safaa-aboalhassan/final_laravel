@extends('layouts.app')

@section('body')
    <h1>Create New Food Item</h1>

    <form action="{{ route('food.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Food Name -->
        <div class="mb-3">
            <label for="Name" class="form-label">Food Name</label>
            <input type="text" value="{{ old('food_name') }}" class="form-control" id="Name" name="food_name">
            @error('food_name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Food Category -->
        <div class="col-md-6">
            <label for="category" class="form-label">Food Category</label>
            <select class="form-select" id="category" name="food_category">
                @foreach ($categories as $category)
                    <option {{ old('food_category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
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

        <!-- Food Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Food Price</label>
            <input type="text" value="{{ old('food_price') }}" class="form-control" id="price" name="food_price">
            @error('food_price')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input id="image" type="file" class="form-control" name="image">
            @error('image')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
