<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    protected $guarded = [];

    public function slides() {
        return $this->hasMany(Slide::class);
    }

    public function slideShows() {
        return $this->hasMany(SlideShow::class);
    }

    public function activeSlideShow() {
        return $this->belongsTo(SlideShow::class, 'active_slide_show');
    }

    public function getRouteKeyName() {
        return 'url';
    }
}
