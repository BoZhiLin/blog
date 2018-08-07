<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Entities\Post');
    }
}
