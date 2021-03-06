@extends('layout')
@section('title')
    {{__('site.home')}}
@endsection
@section('content')
 <!-- Start Landing  -->
 <div class="landing d-flex justify-content-center align-items-center">
    <div class="text-center text-light">
      <h1>{{ __('site.homeH1')}}</h1>
      <p class="fs-6 text-white-50 mb-5">
        {{ __('site.homeP') }}
      </p>
      <a class="btn rounded-pill main-btn" href="{{ route('books.index') }}">{{ __('site.getStarted') }}</a>
    </div>
  </div>
  <!-- End Landing  -->

@endsection
