
@extends('layouts.app')

@section('content')

    <h1>Post page {{$id}}  {{$name}}</h1>

@stop

@section('footer')

    <h1>Post page {{$id}}</h1>
    <script>alert('hello visitor')</script>
@stop