@extends('layouts.index')
@section('content')
@include('navbar')
@if(Illuminate\Support\Facades\Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Illuminate\Support\Facades\Session::get('message') }}</p>
@endif
@if(Illuminate\Support\Facades\Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Illuminate\Support\Facades\Session::get('error') }}</p>
@endif
<br><button class="btn btn-primary"><a style="color:white;text-decoration:none;" href="/add-location">New Location</a></button><br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Location</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($locations as $location)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$location->location}}</td>
      <td><a  href="/edit-location/{{encrypt($location->id)}}"><i class="bi bi-pencil"></i></a></td>
      <td><a  href="/delete-location/{{encrypt($location->id)}}"><i class="bi bi-trash"></i></a></td>
    </tr>
    @endforeach
    
  
  </tbody>
</table>
@endsection