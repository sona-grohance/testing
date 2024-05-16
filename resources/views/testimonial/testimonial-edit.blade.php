@extends('layouts.index')
@section('content')
@include('navbar')
<div>
<h4>Testimonials</h4>
<form method="POST" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="exampleInputName1">Client Name</label>
    <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="exampleInputName1" aria-describedby="emailHelp" value="{{$testimonial->client_name}}" name="client_name">
    @error('client_name') <p class="alert alert-danger">{{$message}}</p> @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPhoto1">Photo</label><br>
    <img src="{{ asset('storage/images/' . $testimonial->image) }}" alt="{{$testimonial->image}}" height="50px" width="50px">
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleInputPhoto1" aria-describedby="emailHelp" name="image" value="{{$testimonial->image}}">
    @error('image') <p class="alert alert-danger">{{$message}}</p> @enderror

  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="description">{{$testimonial->description}}</textarea>
  @error('description') <p class="alert alert-danger">{{$message}}</p> @enderror

</div>
<button class="btn btn-primary" type="submit">Submit</button>
</form>
</div>
@endsection