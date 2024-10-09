@extends('layouts.app')

@section('body')
    <h1>Edit witter</h1>

    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('witter.update', ['witter' => $witter->id]) }}" method="POST" >
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Name" class="form-label">Witter Name</label>
            <input type="text" value="{{ old('witter_name') ?? $witter->name }}" class="form-control" id="Name" name="witter_name">
            
            @error('witter_name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" value="{{ old('witter_phone') ?? $witter->phone }}" class="form-control" id="phone" name="witter_phone">
            
            @error('witter_phone')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        

       <div class="mb-3">
    <label for="salary" class="form-label"> Salary </label>
    <input type="text" value="{{ old('witter_salary') ?? $witter->salary }}" class="form-control" id="salary" name="witter_salary">
    
    @error('witter_salary')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @enderror
</div>

        
        <button type="submit" class="btn-primary btn">Update Data</button>
    </form>
@endsection
