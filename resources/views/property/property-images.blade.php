@extends('layouts.index')
@section('content')
@include('navbar')
<button class="btn btn-primary"><a style="color:white;text-decoration:none;" href="/add-propertyimage/{{encrypt($id)}}">Add Image</a></button>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   <tr>
    @foreach($propertyImages as $propertyImage)
      <th scope="row">{{$loop->iteration}}</th>
      <td><img src="{{ asset('storage/images/' . $propertyImage->image) }}" alt="{{$propertyImage->image}}" height="50px" width="50px"></td>
      <td><a href="/edit-propertyimage/{{encrypt($propertyImage->id)}}"><i class="bi bi-pencil"></i></a></td>
      <td><a href="/delete-propertyimage/{{encrypt($propertyImage->id)}}"><i class="bi bi-trash"></i></a></td>

    </tr>
    @endforeach
  </tbody>
</table>

@endsection