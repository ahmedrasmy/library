@extends('layout')


@section('title')
    Create Notes
@endsection

@section('content')
<div class="add-book">
  <div class="container">
    <div class="row py-5 ">
      <form class="form col-6 offset-3 p-5" method="POST" action="{{route('notes.store')}}" >
          @csrf
          <div class="mb-3">
            <label for="content" class="form-label">Note</label>
            <textarea name="content" class="form-control" id="content" cols="30" rows="5">{{old('content')}}</textarea>
            @error('content')
                  <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <button type="submit" class="btn rounded-pill main-btn ">Add New Note</button>
        </form>
    </div>
  </div>
</div>

@endsection