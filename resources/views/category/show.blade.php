@extends('layouts.app')

@section('body')
    <h1>{{$category->name}}</h1>
    
    

    <h4>categorydesc:{{$category->description}} category</h1>
    <h4>image:{{$category->image}} category</h1>
   
    <a href="{{url()->previous()}}">Back</a>
@endsection