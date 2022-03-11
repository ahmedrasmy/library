@extends('layout')
@section('title')
    All Books
@endsection
@section('content')
@auth
    <h2>Notes:</h2>
    @foreach(Auth::user()->notes as $note)
        <p>{{ $note->content }}</p>
    @endforeach
    <a href="{{route('notes.create')}}" class="btn btn-info">Add New Note</a>

@endauth

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
        @if (Auth::user()->is_admin==1)
            <a href="{{route('books.delete',$book->id)}}" class="btn btn-danger">Delete</a>
        @endif
    @endauth
@endforeach

<nav aria-label="..." class="mt-5">
    <ul class="pagination">
      {{$books->render()}}
    </ul>
  </nav>

@endsection
