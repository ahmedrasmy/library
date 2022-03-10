@extends('layout')


@section('title')
    Edit Category - {{$category->name}}
@endsection

@section('content')
@include('inc.errors')
<form method="POST" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Title</label>
      <input type="text" name="name" class="form-control" id="name" value="{{old('name') ?? $category->name}}">
    </div>
    <button type="submit" class="btn btn-primary ">Edit</button>
  </form>
@endsection