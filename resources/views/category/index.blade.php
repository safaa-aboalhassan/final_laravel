@extends('layouts.app')


@section('body')
    <h1>category Info.</h1>

    <x-operation.success />
    
    <div class="my-3">
        <a href="{{route('category.create')}}" class="btn btn-primary">Create new category</a>
    </div>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm" style="background-color: #dcdcdc;">
                    <img src="{{ asset('' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}"style="width: 100%; height: 330px; object-fit: cover;" >
                    <div class="card-body" style="background-color: #3d9076;">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <p class="card-text"><small class="text-muted">Created At: {{ $category->created_at->format('d M Y, h:i A') }}</small></p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('category.show', ['category' => $category->id]) }}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Show
                            </a>
                            <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Update
                            </a>
                            <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
                
         

        {{-- <div class="mt-3">
            {{$categories->render()}}
        </div> --}}
    </div>
@endsection

