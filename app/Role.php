<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Role extends Model
{
    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }
}
