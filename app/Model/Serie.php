<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Serie extends Model
{
    use SearchableTrait;
    use HasSlug;
    protected $fillable = [
        'title',
        'created_year',
        'poster_path',
    ];
    protected $searchable = [
        'columns' => [
            'series.title' => 10,
        ],
    ];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function seasons()
    {
        return $this->hasMany(Season::class)->latest();
    }


}
