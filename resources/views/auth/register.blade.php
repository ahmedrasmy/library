@extends('layout')


@section('title')
    Register
@endsection

@section('content')
@include('inc.errors')
<form method="POST" action="{{route('auth.handle-register')}}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" >
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" >
      </div>
      <div class="mb-3">
        <label for="pass" class="form-label">Password</label>
        <input type="password" name="pass" class="form-control" id="pass" value="{{old('pass')}}" >
      </div>
    
    <button type="submit" class="btn btn-primary ">Register</button>
  </form>
@endsection