<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;

use App\User;

use App\Reply;

class Comment extends Model
{
    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    protected $fillable=['post_id', 'user_id', 'comment'];
}
