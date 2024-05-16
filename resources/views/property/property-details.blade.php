@extends('layouts.index')
@section('content')
@include('navbar')
<h3>{{$property->name}}</h3>
<h5>{{$locations[$property->location_id]}}</h5>
<h6>{{$property->short_description}}</h6>
<p>{{$property->description}}</p>

@foreach($propertyImages as $propertyImage)
<img src="{{ asset('storage/images/' . $propertyImage->image) }}" alt="{{$propertyImage->image}}" width="100px" height="100px">
@endforeach
@endsection