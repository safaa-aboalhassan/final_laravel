@extends('layouts.app')

@section('body')
    <h1>Create New Chef</h1>

    <form action="{{ route('chef.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="Name" class="form-label">Chef Name</label>
            <input type="text" value="{{ old('name') }}" class="form-control" id="Name" name="name">
            @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" value="{{ old('phone') }}" class="form-control" id="phone" name="phone">
            @error('phone')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" step="0.01" value="{{ old('salary') }}" class="form-control" id="salary" name="salary">
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
                    <option {{ old('chef_category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
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

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
