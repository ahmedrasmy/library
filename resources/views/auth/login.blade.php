@extends('layout')


@section('title')
 {{__('site.login')}}
@endsection

@section('content')
<div class="login">
  <div class="container"> 
    <div class="row pt-5 ">
      <form class="form col-12 col-md-6 offset-md-3 p-5" method="POST" action="{{route('auth.handle-login')}}">
          @csrf
          <div class="mb-3">
              <label for="email" class="form-label">{{__('site.email')}}</label>
              <input type="text" name="email" placeholder="{{__('site.Enter Your Email')}}" class="form-control" id="email" value="{{old('email')}}" >
              @error('email')
                  <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">{{__('site.password')}}</label>
              <input type="password" name="password"  placeholder="{{__('site.Enter Your Password')}}" class="form-control" id="password" value="{{old('password')}}" >
              @error('password')
                  <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
          
          <button type="submit" class="btn main-btn d-block w-100">{{__('site.login')}}</button>


        </form>  
    </div>
    <div class="row">
      <div class="col-12 col-md-6 offset-md-3">
    
    <div class="login-with p-3 mt-3 text-center">
          <h5 class="text-black">{{__('site.Or you can Login With')}}</h5>
          <ul class="d-flex justify-content-center align-items-center mt-3 list-unstyled gap-3">
            <li>
              <a class="d-block text-light" href="{{ url('/login/facebook/redirect') }}"
                ><i
                  class="fa-brands fa-facebook fa-lg facebook rounded-circle p-2"
                ></i
              ></a>
            </li>
            <li>
              <a class="d-block text-light" href="{{ url('/login/github/redirect') }}"
                ><i
                  class="fa-brands fa-github fa-lg github rounded-circle p-2"
                ></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection