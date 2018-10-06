<article class="col-xs-12 col-sm-5 col-md-3">
    <a href="{{ route('movies.show', $movie->slug) }}" class="text-center filma24-content">
        <div class="filma24-card">
            <img class="filma24-image" style="height: 335px" src="{{ asset('storage/'.$movie->poster_path) }}" alt="Movie" />
            <div class="bottom-left">
                @foreach($movie->genres as $genre)
                    <span href="{{ route('showGenreBySlug', $genre->slug) }}">{{ $genre->name }}</span>
                @endforeach</div>
            <div class="top-left">{{ $movie->release_date }}</div>
            <div class="top-right">{{ $movie->rating }} <i class="fa fa-star"></i> </div>
            <div class="centered"><h5>{{ $movie->title }}</h5></div>
        </div>
    </a>
</article>
