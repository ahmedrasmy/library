@extends('layout')


@section('title')
    Create Book
@endsection

@section('content')
<div class="add-book">
  <div class="container">
    <div class="row py-5 ">
      <form class="form col-6 offset-3 p-5" method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" >
            @error('title')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea name="desc" class="form-control" id="desc" cols="30" rows="5">{{old('desc')}}</textarea>
            @error('desc')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="img" class="form-label">Img</label>
            <input class="form-control" type="file" id="img" name='img'>
            @error('img')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <p>Select Categories: </p>
          <?php $i=1 ?>
          @foreach ($categories as $category)
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="categories_ids[]" value="{{$category->id}}" id="check-{{$i}}">
            <label class="form-check-label" for="check-{{$i}}">
              {{ $category->name }}
            </label>
          </div>
          <?php $i++ ?>
          @endforeach
          @error('categories_ids')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
          <br>
          <button type="submit" class="btn rounded-pill main-btn ">Add Book</button>
        </form>
      </div>
  </div>
</div>

@endsection