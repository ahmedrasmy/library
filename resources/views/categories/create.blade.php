@extends('layout')


@section('title')
    Create Category
@endsection

@section('content')
@include('inc.errors')
<div class="add-category">
  <div class="container">
    
    <div class="row py-5 ">
        <form class="form col-6 offset-3 p-5" method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="title" value="{{old('name')}}" >
          </div>
          <button type="submit" class="btn main-btn ">Add Category</button>
        </form>
    </div>
  </div>
</div>
@endsection