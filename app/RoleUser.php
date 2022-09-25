<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    //
    protected $table = 'role_user';

    Public function roles()
    {
        return $this->belongsTo('App\Role','role_id','id');
    }

}
