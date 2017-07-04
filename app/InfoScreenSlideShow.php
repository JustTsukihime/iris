<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoScreenSlideShow extends Model
{
    public function slides() {
        return $this->belongsToMany(InfoScreenSlide::class);
    }

    public function infoScreen() {
        return $this->belongsTo(InfoScreen::class);
    }
}
