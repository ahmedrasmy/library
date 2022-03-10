@extends('layout')


@section('title')
    Create Category
@endsection

@section('content')
@include('inc.errors')
<form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="title" value="{{old('name')}}" >
    </div>
    <button type="submit" class="btn btn-primary ">Add</button>
  </form>
@endsection