@extends('layout')

@section('title')
   Show category 
@endsection

@section('content')
<h1>ID Number:: {{$category->id}}</h1>
<h3>{{$category->title}}</h3>
<p>{{$category->desc}}</p>
<hr>

<a href="{{ route('categories.index')}}">back</a>

@endsection