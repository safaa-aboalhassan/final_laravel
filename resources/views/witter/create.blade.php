@extends('layouts.app')

@section('body')
    <h1>Create New Witter</h1>

    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('witter.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="Name" class="form-label">Witter Name</label>
            <input type="text" value="{{ old('witter_name') }}" class="form-control" id="Name" name="witter_name">
            @error('witter_name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" value="{{ old('witter_phone') }}" class="form-control" id="phone" name="witter_phone">
            @error('witter_phone')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" value="{{ old('witter_salary') }}" class="form-control" id="salary" name="witter_salary">
            @error('witter_salary')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
