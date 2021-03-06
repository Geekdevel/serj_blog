<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Category;
use User;
use Tag;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'author_id',
        'meta_keywords',
        'meta_description',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tags');
    }
}
