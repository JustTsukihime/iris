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

    public function activeSlideShow() {
        return $this->slideShows()->where('id', $this->active_slide_show)->first()->slides();
    }

    public function getRouteKeyName() {
        return 'url';
    }
}
