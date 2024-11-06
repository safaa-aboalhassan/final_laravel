@extends('layouts.App')

@section('title')
    Login
@endsection

@section('body')
    <h1>Login Page</h1>

    <x-form.validation-error />
    <x-operation.success />

    <form method="POST" action="{{ route('login') }}"> 
        @csrf

        <div class="mb-3">
            <label for="useremail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="useremail" value="{{ old('useremail') }}" required>
        </div>

        <div class="mb-3">
            <label for="userpassword" class="form-label">Password</label>
            <input type="password" name="password" value="{{ old('userpassword') }}" class="form-control" id="userpassword" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
