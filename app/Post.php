<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

use App\Tag;

use App\Comment;

use App\User;


use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

    protected $fillable = ['title', 'content', 'featured', 'category_id', 'slug', 'user_id'];

    protected $dates = ['deleted_at'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }



    public function user(){
        return $this->belongsTo('App\User');
    }

}
