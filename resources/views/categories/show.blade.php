@extends('layout')

@section('title')
   Show category 
@endsection

@section('content')
<h1>ID Number:: {{$category->id}}</h1>
<h3>{{$category->name}}</h3>
<h2>Books :: </h2>
<ul>
   @foreach ($category->books as $book)
       <li>{{$book->title}}</li>
   @endforeach
</ul>
<hr>

<a href="{{ route('categories.index')}}">back</a>

@endsection