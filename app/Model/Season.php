<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['season_nr', 'poster_path'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

}
