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
            <label for="content_en" class="form-label">{{__('site.content_en')}}</label>
            <textarea name="content_en" class="form-control" id="content_en" cols="30" rows="5">{{old('content_en')}}</textarea>
            @error('content_en')
                  <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="content_ar" class="form-label">{{__('site.content_ar')}}</label>
            <textarea name="content_ar" class="form-control" id="content_ar" cols="30" rows="5">{{old('content_ar')}}</textarea>
            @error('content_ar')
                  <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <button type="submit" class="btn rounded-pill main-btn ">{{__('site.Add New Note')}}</button>
        </form>
    </div>
  </div>
</div>

@endsection