@extends('layout')


@section('title')
    {{__('site.Create Book')}}
@endsection

@section('content')
<div class="add-book">
  <div class="container">
    <div class="row py-5 ">
      <form class="form col-6 offset-3 p-5" method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title_en" class="form-label">{{__('site.title_en')}}</label>
            <input type="text" name="title_en" placeholder="{{__('site.Enter Your Book Title')}}" class="form-control" id="title_en" value="{{old('title_en')}}" >
            @error('title_en')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="title_ar" class="form-label">{{__('site.title_ar')}}</label>
            <input type="text" name="title_ar" placeholder="{{__('site.Enter Your Book Title')}}" class="form-control" id="title_ar" value="{{old('title_ar')}}" >
            @error('title_ar')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="desc_en" class="form-label">{{__('site.description_en')}}</label>
            <textarea name="desc_en" placeholder="{{__('site.Enter Your Book Description')}}" class="form-control" id="desc_en" cols="30" rows="5">{{old('desc_en')}}</textarea>
            @error('desc_en')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="desc_ar" class="form-label">{{__('site.description_ar')}}</label>
            <textarea name="desc_ar"  placeholder="{{__('site.Enter Your Book Description')}}" class="form-control" id="desc_ar" cols="30" rows="5">{{old('desc_ar')}}</textarea>
            @error('desc_ar')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="img" class="form-label">{{__('site.img')}}</label>
            <input class="form-control" type="file" placeholder="{{__('site.Enter Book Image')}}" id="img" name='img'>
            @error('img')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <p>{{__('site.select categories')}} </p>
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
          <button type="submit" class="btn rounded-pill main-btn ">{{__('site.Add Book')}}</button>
        </form>
      </div>
  </div>
</div>

@endsection