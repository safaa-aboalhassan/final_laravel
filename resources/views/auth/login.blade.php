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
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="useremail" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
