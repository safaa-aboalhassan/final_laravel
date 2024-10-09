@extends('layouts.app')

@section('body')
    <h1>Create New order</h1>

    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="Name" class="form-label">order number </label>
            <input type="text" value="{{ old('order_number') }}" class="form-control" id="Name" name="order_number">
            @error('order_number')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="food" class="form-label">food</label>
            <select class="form-select" id="food" name="food">
                <option>Select food</option>

                @foreach ($foods as $food)
                    <option {{ old('food') == $food->id ? 'selected' : '' }} value="{{ $food->id }}">
                        {{ $food->name}}
                    </option>
                @endforeach
            </select>
            @error('food')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="col-md-6">
            <label for="table" class="form-label">table</label>
            <select class="form-select" id="table" name="table">
                <option>Select food</option>

                @foreach ($tables as $table)
                    <option {{ old('table') == $table->id ? 'selected' : '' }} value="{{ $table->id }}">
                        {{ $table->number}}
                    </option>
                @endforeach
            </select>
            @error('table')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">quantity </label>
            <input type="text" value="{{ old('quantity') }}" class="form-control" id="quantity" name="quantity">
            @error('quantity')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="price" class="form-label">price </label>
            <input type="text" value="{{ old('price') }}" class="form-control" id="price" name="price">
            @error('price')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
