@extends('layout')


@section('title')
    Register
@endsection

@section('content')
<div class="registeer">
  <div class="container"> 
    <div class="row py-5 ">
    <form class="form col-6 offset-3 p-5" method="POST" action="{{route('auth.handle-register')}}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" >
          @error('name')
                  <small class="form-text text-danger">{{$message}}</small>
          @enderror

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" >
            @error('email')
                  <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}" >
            @error('password')
                  <small class="form-text text-danger">{{$message}}</small>
            @enderror
          </div>
        
        <button type="submit" class="btn main-btn mb-3 ">Register</button> <br>
        <a href="{{ url('index/login/github/redirect') }}" class="btn main-btn">Sign Up With Github</a>
        <a href="{{ url('index/login/facebook/redirect') }}" class="btn main-btn">Sign Up With facebook</a>
      </form>
  </div>    
  </div>    
</div>    
@endsection