@extends('layouts.app')

@section('body')
    <h1>update  user</h1>

    {{-- <x-form.validation-error /> --}}

    <form action="{{ route('user.update', $user->id) }}" method="POST" >
        @csrf
    @method('PUT')

        <div class="mb-3">
            <label for="Name" class="form-label">User Name</label>
            <input type="text" value="{{ old('name', $user->name) }}" class="form-control" id="Name" name="name">
            @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password"  value="{{ old('password', $user->password) }}" class="form-control" id="password" name="password">
            @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" value="{{ old('email', $user->email) }}" class="form-control" id="email" name="email">
            @error('email')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>admin</option>
                <option value="waiter" {{ old('role', $user->role) == 'waiter' ? 'selected' : '' }}>waiter</option>
                <option value="chef" {{ old('role', $user->role) == 'chef' ? 'selected' : '' }}>chef</option>
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
                <option value="1" {{ old('is_admin', $user->is_admin) == 1 ? 'selected' : '' }}>true</option>
                <option value="0" {{ old('is_admin', $user->is_admin) == 0 ? 'selected' : '' }}>false</option>
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
