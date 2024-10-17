@extends('layouts.app')

@section('body')
    <h1>Food Info</h1>

    <x-operation.success />

    <div class="my-3">
        <a href="{{ route('food.create') }}" class="btn btn-primary">Create new food</a>
    </div>

    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Food Name</th>
                    <th>Food Image</th>
                    <th>Food Category</th>
                    <th>Food Price</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $food->name }}</td>
                    <td><img src="{{ asset('app/'. $food->image) }}" alt="{{ $food->name }}" width="50"></td>

                    <td>{{ optional($food->category)->name }}</td> <!-- Safely handle null category -->
                    <td>{{ $food->price }}</td>
                    <td>{{ $food->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <a href="{{ route('food.show', ['food' => $food->id]) }}">Show</a>
                        <a href="{{ route('food.edit', ['food' => $food->id]) }}" class="text-warning">Update</a>
                        <form action="{{ route('food.destroy', ['food' => $food->id]) }}" method="post" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>

        {{-- Pagination (if applicable) --}}
        {{-- <div class="mt-3">
            {{ $foods->render() }}
        </div> --}}
    </div>
@endsection
