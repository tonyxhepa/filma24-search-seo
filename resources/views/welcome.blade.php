@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/filma24.css') }}">
@endsection
@section('content')
    <div class="container-fluid pt-3">
        <div class="jumbotron bg-dark mt-3">
            <h1 class="display-4">Filma24</h1>
            <p class="lead">
                Filma24 ju mundeson shikimin e filmave dhe serialeve me titra shqip
            </p>
            <hr class="border-warning">
            <p>Filma24.stream eshte nje faqe e re dhe mundohet te pershtatet me se miri me vizituesit e kesaj faqeje
                per kete arsye ju lte n kontaktoni per cfaredo ankese ose deshire qe keni.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="mailto:tony@email.com" role="button">Email</a>
            </p>
        </div>
    </div>

<div class="container">
    <div class="row">
        @foreach($movies as $movie)
            @include('layouts.movie_welcome')
        @endforeach
    </div>
    <div class="flex-row">
        <div class="card bg-dark">
            <div class="card-header">Series</div>
        </div> </div>
    <div class="row">
        @foreach($series as $serie)
            @include('layouts.serie_welcome')
        @endforeach
    </div>


</div>
    @endsection()