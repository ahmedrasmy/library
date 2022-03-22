@extends('layout')

@section('title')
   Show Book 
@endsection

@section('content')

<div class="row pt-5">
   <div class="col-md-6 offset-md-3 mb-3">
         <div class="card">
                <img src="{{asset('uploads/books/' . $book->img )}}" class="card-img-top" alt="Book" />
                <div class="card-body text-center">
                    <h3 class="card-title">ID Number:{{ $book->id }}</h3>
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <span class="text-black-50 mb-5">{{ $book->desc}}</span><br><br>
                    <h2>All Categories</h2>
                        @foreach ($book->categories as $category)
                           <p class="text-black-50 text-center">{{$category->name}}</p>
                        @endforeach
                     
                   <a class="btn rounded-pill main-btn text-uppercase fw-bold" href="{{ route('books.index')}}">back</a>
                </div>
            </div>
   </div>
</div>
@endsection