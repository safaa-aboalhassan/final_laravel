@extends('layouts.app')

@section('body')
    <h1>Chef Info</h1>

    <x-operation.success />
    
    <div class="my-3">
        <a href="{{ route('chef.create') }}" class="btn btn-primary">Create new chef</a>
    </div>

    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Chef Name</th>
                    <th>Chef Phone</th>
                    <th>Chef Salary</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chefs as $chef)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $chef->name }}</td>
                        <td>{{ $chef->phone }}</td>
                        <td>{{ $chef->salary }}</td>
                        <td>{{ $chef->category->name }}</td> <!-- Null check added -->
                        <td>{{ $chef->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <a href="{{ route('chef.show', ['chef' => $chef->id]) }}">Show</a>
                            <a href="{{ route('chef.edit', ['chef' => $chef->id]) }}" class="text-warning">Update</a>
                            <form action="{{ route('chef.destroy', ['chef' => $chef->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <div class="mt-3">
            {{ $chefs->render() }}
        </div> --}}
    </div>
@endsection
