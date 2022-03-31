@extends('layout')

@section('title')
   {{__('site.Show Book')}} 
@endsection

@section('content')

<div class="row pt-5">
   <div class="col-md-6 offset-md-3 mb-3">
         <div class="card">
                <img src="{{asset('uploads/books/' . $book->img )}}" class="card-img-top" alt="Book" />
                <div class="card-body text-center">
                    <h3 class="card-title">{{ __('site.ID Number')}} - {{$book->id }}</h3>
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <span class="text-black-50 mb-5">{{ $book->desc}}</span><br><br>
                    <h2>{{__('site.cats')}}</h2>
                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                    @foreach ($book->categories as $category)
                    <p class="text-black-50 text-center">{{$category->name_en}}</p>
                     @endforeach    
                     @else
                     @foreach ($book->categories as $category)
                     <p class="text-black-50 text-center">{{$category->name_ar}}</p>
                      @endforeach 
                    @endif
                        
                     
                   <a class="btn rounded-pill main-btn text-uppercase fw-bold" href="{{ route('books.index')}}">{{__('site.back')}}</a>
                </div>
            </div>
   </div>
</div>
@endsection