@extends('layouts.app')

@section('body')
    <h1>Create New user</h1>

    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="Name" class="form-label">user Name</label>
            <input type="text" value="{{ old('name') }}" class="form-control" id="Name" name="name">
            @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" value="{{ old('password') }}" class="form-control" id="password" name="password">

            @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" value="{{ old('email') }}" class="form-control" id="email" name="email">
            @error('email')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="admin">admin</option>
                <option value="waiter">waiter</option>
                <option value="chef">chef</option>
            </select>
            @error('role')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        

        <div class="mb-3">
            <label for="is_admin" class="form-label">Is Admin</label>
            <select class="form-select" id="is_admin" name="is_admin">
                <option value="1">true</option>
                <option value="0">false</option>
            </select>
            @error('is_admin')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection