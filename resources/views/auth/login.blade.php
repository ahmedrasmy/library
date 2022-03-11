@extends('layout')


@section('title')
    Login
@endsection

@section('content')
@include('inc.errors')
<form method="POST" action="{{route('auth.handle-login')}}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" >
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}" >
      </div>
    
    <button type="submit" class="btn btn-primary ">Login</button>
  </form>
  <a href="{{ route('auth.github.redirect') }}" class="btn btn-success mt-3">Sign Up With Github</a>
@endsection