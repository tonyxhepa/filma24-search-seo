@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/filma24.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($genre->movies as $movie)
                @include('layouts.movie_welcome')
            @endforeach
        </div>
    </div>
   @endsection