<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyRent extends Model
{
    //
    public function Unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function Status()
    {
        return $this->belongsTo('App\Status','status','id');
    }
    public function Tenant()
    {
        return $this->belongsTo('App\tenant');
    }

}
