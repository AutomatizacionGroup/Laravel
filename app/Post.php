<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{

    use SoftDeletes;
     //protected $table = 'posts';
    // protected $primarykey = 'post_id';

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'title',
        'content'



    ];


    public function user(){

    return $this->belongsTo('App\User');

    }



    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags()
    {
        return $this->morphtoMany('App\Tag', 'taggable');
    }

    public static function scopeList($query){

        return $query->orderBy('id','desc')->get();


    }

    public static function scopeCulo($query){

        return $query->orderBy('id','desc')->get();

    }
}
