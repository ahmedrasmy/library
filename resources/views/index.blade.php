@extends('layout')
@section('title')
    Home
@endsection
@section('content')
 <!-- Start Landing  -->
 <div class="landing d-flex justify-content-center align-items-center">
    <div class="text-center text-light">
      <h1>@lang('site.homeH1')</h1>
      <p class="fs-6 text-white-50 mb-5">
        @lang('site.homeP')
      </p>
      <a class="btn rounded-pill main-btn" href="{{ route('books.index') }}">@lang('site.getStarted')</a>
    </div>
  </div>
  <!-- End Landing  -->

@endsection
