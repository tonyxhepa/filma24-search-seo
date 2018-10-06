@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">
            @include('layouts.single_movie')
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            M3
        </div>
    </div>
@endsection()