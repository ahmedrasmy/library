@extends('layout')

@section('title')
   Show Book 
@endsection

@section('content')
<h1>ID Number:: {{$book->id}}</h1>
<h3>{{$book->title}}</h3>
<p>{{$book->desc}}</p>
<h2>All Categories</h2>
<ul>
   @foreach ($book->categories as $category)
   <li>{{$category->name}}</li>
   @endforeach
</ul>

<hr>

<a href="{{ route('books.index')}}">back</a>

@endsection