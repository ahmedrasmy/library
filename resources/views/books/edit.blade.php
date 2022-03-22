@extends('layout')


@section('title')
    Edit Book - {{$book->title}}
@endsection

@section('content')
@include('inc.errors')
<div class="edit-book">
  <div class="container">
    <div class="row py-5 ">
<form class="form col-6 offset-3 p-5" method="POST" action="{{route('books.update',$book->id)}}" enctype="multipart/form-data">

    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" value="{{old('title') ?? $book->title}}">
    </div>
    <div class="mb-3">
      <label for="desc" class="form-label">Description</label>
      <textarea name="desc" class="form-control" id="desc" cols="30" rows="5">{{old('desc') ?? $book->desc}}</textarea>
    </div>
    <div class="mb-3">
      <label for="img" class="form-label">Img</label>
      <input class="form-control" type="file" id="img" value="{{old('img') ?? $book->img}}" name='img'>
    </div>
    <p>Select Categories: </p>
    @foreach ($categories as $category)
      <div class="form-check">
      <input class="form-check-input" type="checkbox" name="categories_ids[]" value="{{$category->id}}" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        {{ $category->name }}
      </label>
    </div>
    @endforeach
    <br>
    <button type="submit" class="btn main-btn  ">Edit Book</button>
  </form>
    </div>
  </div>
</div>
@endsection