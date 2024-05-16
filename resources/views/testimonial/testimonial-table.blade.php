@extends('layouts.index')
@section('content')
@include('navbar')
@if(Illuminate\Support\Facades\Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Illuminate\Support\Facades\Session::get('message') }}</p>
@endif
@if(Illuminate\Support\Facades\Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Illuminate\Support\Facades\Session::get('error') }}</p>
@endif
<br><button class="btn btn-primary"><a style="text-decoration:none;color:white;" href="/add-testimonial">New Testimonial</a>
</button>
<br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client Name</th>
      <th scope="col">Photo</th>
      <th scope="col">Description</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($testimonials as $testimonial)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$testimonial->client_name}}</td>
      <td><img src="{{ asset('storage/images/' . $testimonial->image) }}" alt="{{$testimonial->image}}" height="50px" width="50px"></td>
      <td>{{$testimonial->description}}</td>
      <td><a  href="/edit-testimonial/{{encrypt($testimonial->id)}}"><i class="bi bi-pencil"></i></a></td>
      <td><a  href="/delete-testimonial/{{encrypt($testimonial->id)}}"><i class="bi bi-trash"></i></a></td>


    </tr>
    @endforeach
  </tbody>
</table>
@endsection