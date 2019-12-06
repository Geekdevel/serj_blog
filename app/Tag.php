<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Post;

class Tag extends Model
{
    protected $fillable = [
        'title'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tags');
    }
}
