<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function posts()
    {
        return $this->morphedbyMany('App\Post', 'taggable');
    }
    public function videos()
    {
        return $this->morphedbyMany('App\Video', 'taggable');
    }

}
