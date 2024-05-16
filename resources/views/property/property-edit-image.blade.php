@extends('layouts.index')
@section('content')
@include('navbar')
<img src="{{ asset('storage/images/' . $propertyImage->image) }}" alt="{{$propertyImage->image}}" height="50px" width="50px">

<form method="POST" enctype="multipart/form-data">
    @csrf
    <input class="form-control" type="file" name="image"><br>
    <button class="btn btn-primary" type="submit">Upload File</button>
</form>


@endsection