@extends('layouts.index')
@section('content')
@include('navbar')
<form method="POST" enctype=multipart/form-data>
    @csrf
    <div class="form-group">
    <label for="exampleInputName1">Property Name</label>
    <input type="text" class="form-control @error('property_name') is-invalid @enderror" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter Name" name="property_name">
    @error('property_name') <p class="alert alert-danger">{{$message}}</p> @enderror
  </div>
  <label for="exampleInputCategory1">Category</label>
  <select class="form-select" aria-label="Default select example" name="category">
  <option selected>Open this select menu</option>
   <option value="resort">Resort</option>
   <option value="villa">Villa</option>

</select>
  <label for="exampleInputCategory1">Location</label>
  <select class="form-select" aria-label="Default select example" name="location">
  <option selected>Open this select menu</option>
  @foreach($locations as $location)
   <option value="{{$location->id}}">{{$location->location}}</option>
   @endforeach
</select>
<div class="form-group">
    <label for="description">Short Description</label>
    <textarea class="form-control" id="description"  rows="3" placeholder="Enter description" name="short_description" required></textarea>
</div>
<div class="form-group">
            <label for="content">Description</label>
            <textarea class="form-control" id="content" name="description"></textarea>
        </div>

<div class="form-group">
    <label for="exampleInputName1">Image 1</label>
    <input type="file" class="form-control @error('images') is-invalid @enderror" id="exampleInputName1" aria-describedby="emailHelp"  name="images[]">
    @error('images') <p class="alert alert-danger">{{$message}}</p> @enderror
</div>
<div class="form-group">
    <label for="exampleInputName1">Image 2</label>
    <input type="file" class="form-control @error('images') is-invalid @enderror" id="exampleInputName1" aria-describedby="emailHelp"  name="images[]">
    @error('images') <p class="alert alert-danger">{{$message}}</p> @enderror
</div>
<div class="form-group">
    <label for="exampleInputName1">Image 3</label>
    <input type="file" class="form-control @error('images') is-invalid @enderror" id="exampleInputName1" aria-describedby="emailHelp"  name="images[]">
    @error('images') <p class="alert alert-danger">{{$message}}</p> @enderror
</div>
<div class="form-group">
    <label for="exampleInputName1">Image 4</label>
    <input type="file" class="form-control @error('images') is-invalid @enderror" id="exampleInputName1" aria-describedby="emailHelp"  name="images[]">
    @error('images') <p class="alert alert-danger">{{$message}}</p> @enderror
</div>
<div class="form-group">
    <label for="exampleInputName1">Image 5</label>
    <input type="file" class="form-control @error('images') is-invalid @enderror" id="exampleInputName1" aria-describedby="emailHelp"  name="images[]">
    @error('images') <p class="alert alert-danger">{{$message}}</p> @enderror
</div>

<button type=submit class="btn btn-primary">Submit</button>
</form>
@endsection