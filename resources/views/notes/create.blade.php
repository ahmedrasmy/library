@extends('layout')


@section('title')
    Create Notes
@endsection

@section('content')
@include('inc.errors')
<form method="POST" action="{{route('notes.store')}}" >
    @csrf
    <div class="mb-3">
      <label for="content" class="form-label">Note</label>
      <textarea name="content" class="form-control" id="content" cols="30" rows="5">{{old('content')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary ">Add New Note</button>
  </form>
@endsection