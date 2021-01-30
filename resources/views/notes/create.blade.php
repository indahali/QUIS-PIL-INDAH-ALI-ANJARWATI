@extends('layouts.app')

@section('title', 'notes')

@section('content')

<form action="/notes" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{ old('description') }}">
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
 
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection