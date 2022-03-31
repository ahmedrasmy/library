@extends('layout')
@section('title')
   {{__('site.All Categories')}} 
@endsection
@section('content')
<!-- Start Category  -->
<div class="category pt-5 pb-5">
    <div class="container">
      <div class="main-title text-center mt-5 mb-5 position-relative">
        <img class="mb-4" src="{{asset('imgs/title.png')}}" alt="" />
        <h2>{{__('site.All Categories')}}</h2>
            @auth
                <div class="d-flex justify-content-center pb-2 pt-2">
                    <a class="btn rounded-pill main-btn text-uppercase" href="{{route('categories.create')}}">Create</a>
                </div>
            @endauth
      </div>
      <div class="row">
        @foreach($categories as $category)
            <div class="col-md-6 col-lg-4 mb-3">
            <div class="card py-5">
                <div class="card-body text-center">
                    <h5 class="card-title"><a class="btn rounded-pill main-btn mb-3 fw-bold" href="{{route('categories.show',$category->id)}}">{{ $category->name }}</a></h5>

                    <a href="{{route('categories.show',$category->id)}}" class="btn btn-primary">{{__('site.Show')}}</a>
                    @auth
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success">{{__('site.Edit')}}</a>
                        @if (Auth::user()->is_admin==1)
                            <a href="{{route('categories.delete',$category->id)}}" class="btn btn-danger">{{__('site.Delete')}}</a>
                        @endif
                    @endauth
                </div>
            </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- End Category  -->
@endsection
