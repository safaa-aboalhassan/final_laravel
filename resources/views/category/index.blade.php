@extends('layouts.app')


@section('body')
    <h1>category Info.</h1>

    <x-operation.success />
    
    <div class="my-3">
        <a href="{{route('category.create')}}" class="btn btn-primary">Create new category</a>
    </div>
    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category name</th>
                    <th>Category description</th>
                    <th>Category image</th>
                    <th>Create at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <img src="{{asset("$category->image")}}">
                    </td>
                    <td>{{$category->created_at->format('d M Y , h:i A')}}</td>
                    <td>
                        <a href="{{ route('category.show', ['category' => $category->id]) }}">Show</a>
                        <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="text-warning">Update</a>
                        <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post" style="display:inline;">
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

@section('js')
<script src="{{asset('js/main.js')}}"></script>
@endsection