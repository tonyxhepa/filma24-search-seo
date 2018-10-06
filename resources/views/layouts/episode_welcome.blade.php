<article class="col-xs-12 col-sm-5 col-md-3">
    <a href="{{ route('episodes.show',  $episode->slug)}}" class="text-center filma24-content">
        <div class="filma24-card">
            <img class="filma24-image" style="height: 335px" src="{{ asset('storage/'.$season->poster_path) }}" alt="Movie" />

            <div class="top-left">HD</div>
            <div class="centered"><h5>{{ $episode->title }}</h5></div>
        </div>
    </a>
</article>
