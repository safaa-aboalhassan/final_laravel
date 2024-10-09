@extends('layouts.app')

@section('body')
    <h1>Create New table</h1>

    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('table.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="Name" class="form-label">table_number </label>
            <input type="text" value="{{ old('table_number') }}" class="form-control" id="Name" name="table_number">
            @error('table_number')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">table_status</label>
            
            <select class="form-select" id="status" name="table_status">
    
                    <option>available</option>
                    <option>busy</option>
                    
            </select>



            @error('table_status')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

       

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
