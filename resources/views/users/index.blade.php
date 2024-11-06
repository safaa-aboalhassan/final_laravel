@extends('layouts.app')


@section('body')
    <h1>user Info.</h1>

    <x-operation.success />
    
    <div class="my-3">
        <a href="{{route('user.create')}}" class="btn btn-primary">Create new user</a>
    </div>
    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>uesr name</th>
                    <th>uesr email</th>
                    <th>uesr password</th>
                    <th>uesr is admin</th>
                    <th>uesr rolle</th>
                    <th>Create at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->is_admin}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->created_at->format('d M Y , h:i A')}}</td>
                        <td>
                            <a href="{{ route('user.edit',['user'=>$user->id]) }}" class="text-warning">update</a>
                            <form  action="{{ route('user.destroy',['user'=>$user->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
            
        </table>

        {{-- <div class="mt-3">
            {{$categories->render()}}
        </div> --}}
    </div>
@endsection