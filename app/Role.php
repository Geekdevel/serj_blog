<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function usesr()
    {
        return $this->belongsToMany('App\User', 'user_roles', 'role_id', 'user_id');
    }
}
