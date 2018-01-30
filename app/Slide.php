<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded = [];
    protected $visible = ['id', 'name', 'url'];

    public function infoScreen() {
        return $this->belongsTo(Screen::class);
    }

    public function slideShows() {
        return $this->belongsToMany(SlideShow::class);
    }
}
