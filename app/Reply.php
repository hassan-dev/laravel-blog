<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Comment;

use App\User;

class Reply extends Model
{
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }



    protected $fillable = ['reply', 'user_id', 'post_id', 'comment_id'];
}
