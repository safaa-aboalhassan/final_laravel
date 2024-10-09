@extends('layouts.app')

@section('body')
    <h1>Create New Category</h1>

    {{-- Validation error component can be included here if you have one --}}
    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" value="{{ old('category_name') }}" class="form-control" id="categoryName" name="category_name">
            @error('category_name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" value="{{ old('desc') }}" id="description" name="desc" placeholder="Enter description">
            @error('desc')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input id="image" type="file" class="form-control" name="image">
            @error('image')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div> 

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
