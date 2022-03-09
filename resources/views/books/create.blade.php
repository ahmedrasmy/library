@extends('layout')


@section('title')
    Create Book
@endsection

@section('content')
@include('inc.errors')
<form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" >
    </div>
    <div class="mb-3">
      <label for="desc" class="form-label">Description</label>
      <textarea name="desc" class="form-control" id="desc" cols="30" rows="5">{{old('desc')}}</textarea>
    </div>
    <div class="mb-3">
      <label for="img" class="form-label">Img</label>
      <input class="form-control" type="file" id="img" name='img'>
    </div>
    <button type="submit" class="btn btn-primary ">Add</button>
  </form>
@endsection