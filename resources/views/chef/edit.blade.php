@extends('layouts.app')

@section('body')
    <h1>Edit chef</h1>

    <x-form.validation-error />

    <form action="{{ route('chef.update', ['chef' => $chef->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Name" class="form-label">Chef Name</label>
            <input type="text" value="{{ old('name') ?? $chef->name}}" class="form-control" id="Name" name="name">
            @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" value="{{ old('phone') ?? $chef->phone }}" class="form-control" id="phone" name="phone">
            @error('phone')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" step="0.01" value="{{ old('salary') ?? $chef->salary }}" class="form-control" id="salary" name="salary">
            @error('salary')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="category" class="form-label">Chef Category</label>
            <select class="form-select" id="category" name="chef_category">
                <option>Select category</option>

                @foreach ($categories as $category)
                    <option 
                        value="{{ $category->id }}" 
                        {{ (old('category_id') ?? $chef->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('chef_category')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
    <button type="submit" class="btn-primary btn">Update data</button>
    </form>
@endsection
