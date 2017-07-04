<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoScreen extends Model
{
    protected $guarded = [];

    public function slides() {
        return $this->hasMany(InfoScreenSlide::class);
    }

    public function slideShows() {
        return $this->hasMany(InfoScreenSlideShow::class);
    }
}
