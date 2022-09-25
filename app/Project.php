<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    public function Floors()
    {
        return $this->hasMany('App\Floor');
    }
    public function Units()
    {
        return $this->hasMany('App\Unit');
    }
}
