@extends('layouts.app')

@section('body')
    <h1>Food Info</h1>

    <x-operation.success />

    <div class="my-3">
        <a href="{{ route('food.create') }}" class="btn btn-primary">Create new food</a>
    </div>

    <div class="row">
        @foreach ($foods as $food)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('' . $food->image) }}" class="card-img-top" alt="{{ $food->name }}" style="width: 100%; height: 150px; object-fit: cover;" >
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <p class="card-text">Category: {{ optional($food->category)->name }}</p>
                        <p class="card-text">Price: {{ $food->price }}$</p>
                        <p class="card-text"><small class="text-muted">Created At: {{ $food->created_at->format('d M Y, h:i A') }}</small></p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('order.create', ['food' => $food->id]) }}" class="btn btn-info">create order</a>
                            <a href="{{ route('food.edit', ['food' => $food->id]) }}" class="btn btn-warning">Update</a>
                            <form action="{{ route('food.destroy', ['food' => $food->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
            
            </tbody>
        </table>

        {{-- Pagination (if applicable) --}}
        {{-- <div class="mt-3">
            {{ $foods->render() }}
        </div> --}}
    </div>
@endsection

@section('js')
<script src="{{asset('js/menu.js')}}"></script>
@endsection