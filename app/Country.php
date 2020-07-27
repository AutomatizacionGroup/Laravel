<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function post(){

            return $this->hasManyThrough('App\Post', 'App\user');
      //      return $this->hasManyThrough('App\Post', 'App\user','country_id','user_id'); same

    }
    public function photos()
    {
        return $this->morphMany('App\Country', 'imageable');
    }

}
