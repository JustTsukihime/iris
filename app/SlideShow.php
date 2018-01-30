<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    protected $guarded = [];

    public function slides() {
        return $this->belongsToMany(Slide::class);
    }

    public function infoScreen() {
        return $this->belongsTo(Screen::class);
    }
}
