@extends('layouts.app')


@section('body')
    <h1>witter Info.</h1>

    <x-operation.success />
    
    <div class="my-3">
        <a href="{{route('witter.create')}}" class="btn btn-primary">Create new witter</a>
    </div>
    <div class="my-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>witter name</th>
                    <th>witter phone</th>
                    <th>witter salary</th>
                    <th>Create at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($witters as $witter)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$witter->name}}</td>
                        <td>{{$witter->phone}}</td>
                        <td>{{$witter->salary}}</td>
                        <td>{{$witter->created_at->format('d M Y , h:i A')}}</td>
                        <td>
                            <a href="{{ route('witter.show',['witter'=>$witter->id]) }}">Show</a>
                            <a href="{{ route('witter.edit',['witter'=>$witter->id]) }}" class="text-warning">update</a>
                            <form  action="{{ route('witter.destroy',['witter'=>$witter->id]) }}" method="post">
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