@extends('layouts.app')

@section('body')
    <h1>Edit category</h1>

    <x-form.validation-error />

    <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="categoryName" class="form-label">Category name</label>
            <input type="text" value="{{ old('category_name') ?? $category->name }}" class="form-control" id="categoryName" name="category_name">
        </div>

        <div class="mb-3">
            <label for="categorydesc" class="form-label">Category description</label>
            <input type="text" value="{{ old('desc') ?? $category->description }}" class="form-control" id="categorydesc" name="desc">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Category image</label>
            <input id="image" type="file" value="{{ old('image') ?? $category->image }}"  class="form-control" name="image">
        </div>
        
        <button type="submit" class="btn-primary btn">Update data</button>
    </form>
@endsection
