@extends('layouts.app')


@section('body')
    <h1>tabl Info.</h1>

    <x-operation.success />
    
    <div class="my-3">
        <a href="{{route('table.create')}}" class="btn btn-primary">Create New table</a>
    </div>
    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>table number</th>
                  
                    <th>Create at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($tabls as $table)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$table->number}}</td>
                        <td>{{$table->created_at->format('d M Y , h:i A')}}</td>
                        <td>
                            <a href="{{ route('table.show',['table'=>$table->id]) }}">Show</a>
                            <a href="{{ route('table.edit',['table'=>$table->id]) }}" class="text-warning">update</a>
                            <form  action="{{ route('table.destroy',['table'=>$table->id]) }}" method="post">
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