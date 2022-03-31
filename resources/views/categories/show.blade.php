@extends('layout')

@section('title')
  {{__('site.Show category')}}  
@endsection

@section('content')

<div class="row pt-5">
   <div class="col-md-6 offset-md-3 mb-3">
         <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">{{__('site.ID Number')}} -{{ $category->id }}</h3>
                    <h5 class="card-title">{{$category->name}}</h5>
                    <h2>{{__('site.books')}}</h2>
                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                        @foreach ($category->books as $book)
                           <p class="text-black-50 text-center">{{$book->title_en}}</p>
                        @endforeach
                    @else
                        @foreach ($category->books as $book)
                           <p class="text-black-50 text-center">{{$book->title_ar}}</p>
                        @endforeach
                    @endif
                        
                   <a class="btn rounded-pill main-btn text-uppercase fw-bold" href="{{ route('categories.index')}}">{{__('site.back')}}</a>
                </div>
            </div>
   </div>
</div>

@endsection