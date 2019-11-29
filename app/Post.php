<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Category;
use User;
use Tag;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category', 'id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'author_id');
    }

    public function tags()
    {
        return $this->hasMany('App\Tag', 'post_tags', 'post_id', 'tag_id');
    }
}
