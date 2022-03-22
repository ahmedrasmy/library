@extends('layout')

@section('title')
   Show category 
@endsection

@section('content')

<div class="row pt-5">
   <div class="col-md-6 offset-md-3 mb-3">
         <div class="card">
                {{-- <img src="{{asset('uploads/books/' . $book->img )}}" class="card-img-top" alt="Book" /> --}}
                <div class="card-body text-center">
                    <h3 class="card-title">ID Number:{{ $category->id }}</h3>
                    <h5 class="card-title">{{$category->name}}</h5>
                    <h2>Books</h2>
                        @foreach ($category->books as $book)
                           <p class="text-black-50 text-center">{{$book->title}}</p>
                        @endforeach
                   <a class="btn rounded-pill main-btn text-uppercase fw-bold" href="{{ route('categories.index')}}">back</a>
                </div>
            </div>
   </div>
</div>

@endsection