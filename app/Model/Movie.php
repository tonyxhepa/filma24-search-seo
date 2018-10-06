<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Movie extends Model
{
    use SearchableTrait;
    use HasSlug;
    protected $fillable = [
        'title',
        'runing_time',
        'release_date',
        'description',
        'rating',
        'poster_path'
    ];
    protected $searchable = [
        'columns' => [
            'movies.title' => 10,
            'movies.release_date' => 10
        ],
    ];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function embeds()
    {
        return $this->morphMany(Embed::class, 'embedable');
    }
    public function watchlinks()
    {
        return $this->morphMany(Watchlink::class, 'watchlinkable');
    }
    public function downloadlinks()
    {
        return $this->morphMany(Downloadlink::class, 'downloadlinkable');
    }
    public function trailerlinks()
    {
        return $this->morphMany(Trailerlink::class, 'trailerlinkable');
    }
    public function delete()
    {
        return parent::delete();
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class)
            ->withTimestamps();
    }

}
