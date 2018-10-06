@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/filma24.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @if($movies)
                @foreach($movies as $movie)
                @include('layouts.movie_welcome')
                @endforeach
            @else
                <h2>Nuk u gjet asnje film</h2>
            @endif
        </div>
        <div class="flex-row border-bottom border-warning">Series</div>
        <div class="row">
            @if(!empty($series))
                @foreach($series as $serie)
                    @include('layouts.serie_welcome')
                @endforeach
            @else
                <h2>Nuk u gjet asnje Serial</h2>
            @endif
        </div>
    </div>

@endsection()