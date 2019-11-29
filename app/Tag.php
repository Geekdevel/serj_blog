<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Post;

class Tag extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post', 'post_tags', 'tag_id', 'post_id');
    }
}
