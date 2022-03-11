@extends('layout')
@section('title')
    All Books
@endsection
@section('content')
<h1>All Books</h1>
@auth
    <a href="{{route('books.create')}}" class="btn btn-primary">Create</a>
@endauth
@foreach($books as $book)
    <hr>
   <a href="{{route('books.show',$book->id)}}"><h3>{{ $book->title }}</h3></a>
    <p>{{ $book->desc}}</p>
    <a href="{{route('books.show',$book->id)}}" class="btn btn-primary">Show</a>
    @auth 
        <a href="{{route('books.edit',$book->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('books.delete',$book->id)}}" class="btn btn-danger">Delete</a>
    @endauth
@endforeach

<nav aria-label="..." class="mt-5">
    <ul class="pagination">
      {{$books->render()}}
    </ul>
  </nav>

@endsection
