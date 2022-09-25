<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    //

    public function Project()
    {
        return $this->belongsTo('App\Project');
    }
    public function Units()
    {
        return $this->hasMany('App\Unit');
    }

}
