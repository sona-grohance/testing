@extends('layouts.index')
@section('content')
@include('navbar')
<br>
<form  method="POST">
    @csrf
<div class="form-group">
    <label for="exampleInputLocation1">Location</label>
    <input type="text" class="form-control @error('location') is-invalid @enderror" id="exampleInputLocation1" aria-describedby="emailHelp" value="{{$location->location}}" name="location">
    @error('location') <p class="alert alert-danger">{{$message}}</p> @enderror
 </div>
  <br>
<button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection