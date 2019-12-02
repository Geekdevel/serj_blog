<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Post;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post', 'category_id', 'id');
    }
}