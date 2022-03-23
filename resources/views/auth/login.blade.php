@extends('layout')


@section('title')
    Login
@endsection

@section('content')
@include('inc.errors')
<div class="login">
  <div class="container"> 
    <div class="row py-5 ">
      <form class="form col-6 offset-3 p-5" method="POST" action="{{route('auth.handle-login')}}">
          @csrf
          <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" >
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}" >
            </div>
          
          <button type="submit" class="btn main-btn mb-3">Login</button> <br>
          <a href="{{ url('index/login/github/redirect') }}" class="btn main-btn">Sign Up With Github</a>
          <a href="{{ url('index/login/facebook/redirect') }}" class="btn main-btn">Sign Up With facebook</a>


        </form>
    </div>
  </div>
</div>
@endsection