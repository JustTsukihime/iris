<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoScreenSlide extends Model
{
    protected $guarded = [];
    protected $visible = ['id', 'name', 'url'];

    public function infoScreen() {
        return $this->belongsTo(InfoScreen::class);
    }

    public function slideShows() {
        return $this->belongsToMany(InfoScreenSlideShow::class);
    }
}
