@extends('layouts.index')
@section('content')
@include('navbar')
<form method="POST" enctype="multipart/form-data">
    @csrf
    <input class="form-control" type="file" name="image"><br>
    <button class="btn btn-primary" type="submit">Upload File</button>
</form>
@endsection