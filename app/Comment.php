<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['article_id', 'body'];

    public function articles()
    {
        return $this->belongsTo('App\Article')->withTimestamps();
    }
}
