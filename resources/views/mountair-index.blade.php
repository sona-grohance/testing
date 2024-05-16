@extends('layouts.index')
@section('content')
@include('navbar')

@if(Illuminate\Support\Facades\Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Illuminate\Support\Facades\Session::get('message') }}</p>
@endif

@endsection