@extends('layout')
@section('title')
    All Categories
@endsection
@section('content')
<h1>All Categories</h1>
<a href="{{route('categories.create')}}" class="btn btn-primary">Create</a>

@foreach($categories as $category)
    <hr>
   <a href="{{route('categories.show',$category->id)}}"><h3>{{ $category->name }}</h3></a>
    <a href="{{route('categories.show',$category->id)}}" class="btn btn-primary">Show</a>
    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success">Edit</a>
    <a href="{{route('categories.delete',$category->id)}}" class="btn btn-danger">Delete</a>
@endforeach

{{-- <nav aria-label="..." class="mt-5">
    <ul class="pagination">
      {{$categories->render()}}
    </ul>
  </nav> --}}

@endsection
