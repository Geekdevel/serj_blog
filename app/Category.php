<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Post;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'meta_keywords',
        'meta_description'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post', 'category_id', 'id');
    }
    public function users()
    {
        return $this->belongsToMany('App\User', 'posts', 'category_id', 'author_id');
    }
    /*public function postsAuthor()
    {
        return $this->;
    }*/
}
