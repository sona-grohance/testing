@extends('layouts.index')
@section('content')
@include('navbar')
@if(Illuminate\Support\Facades\Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Illuminate\Support\Facades\Session::get('message') }}</p>
@endif
@if(Illuminate\Support\Facades\Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Illuminate\Support\Facades\Session::get('error') }}</p>
@endif
<br>
<button class="btn btn-primary"><a style="color:white;text-decoration:none;" href="/add-property">New Property</a></button>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Location</th>
      <th scope="col">Short Description</th>
      <th scope="col">Description</th>
      <th scope="col">images</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($properties as $property)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$property->name}}</td>
      <td>{{$property->category}}</td>
      <td>{{$locations[$property->location_id]}}</td>
      <td>{{$property->short_description}}</td>
      <td>{{strip_tags($property->description)}}</td>
      <td>
        <a href="/images-property/{{encrypt($property->id)}}"><i class="bi bi-image-fill"></i>
        </a>
      </td>
      <td><a href="/edit-property/{{encrypt($property->id)}}"><i class="bi bi-pencil"></i></a></td>
      <td><a href="/delete-property/{{encrypt($property->id)}}"><i class="bi bi-trash"></i></a></button></td>
      <td><a href="/details-property/{{encrypt($property->id)}}"><i class="bi bi-eye"></i></i></a></button></td>


    </tr>
    @endforeach

  </tbody>
</table>

@endsection