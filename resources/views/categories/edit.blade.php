@extends('layout')


@section('title')
{{__('site.Edit Category')}}
@endsection

@section('content')
<div class="edit-category">
  <div class="container"> 
    <div class="row py-5 ">
<form class="form col-6 offset-3 p-5" method="POST" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name_en" class="form-label">{{__('site.Name_en')}}</label>
      <input type="text" name="name_en" class="form-control" id="name_en" value="{{old('name_en') ?? $category->name_en}}">
      @error('name_en')
            <small class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name_ar" class="form-label">{{__('site.Name_ar')}}</label>
      <input type="text" name="name_ar" class="form-control" id="name_ar" value="{{old('name_ar') ?? $category->name_ar}}">
      @error('name_ar')
            <small class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
    <button type="submit" class="btn main-btn ">{{__('site.Edit Category')}}</button>
  </form>
    </div>
    </div>
  </div>
@endsection