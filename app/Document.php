<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    public function Media()
    {
        return $this->hasMany('App\Media');
    }
}
