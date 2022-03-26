@extends('layout')


@section('title')
    Edit Category - {{$category->name}}
@endsection

@section('content')
<div class="edit-category">
  <div class="container"> 
    <div class="row py-5 ">
<form class="form col-6 offset-3 p-5" method="POST" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Title</label>
      <input type="text" name="name" class="form-control" id="name" value="{{old('name') ?? $category->name}}">
      @error('name')
            <small class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
    <button type="submit" class="btn main-btn ">Edit Category</button>
  </form>
    </div>
    </div>
  </div>
@endsection