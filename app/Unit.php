<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //

    public function Project()
    {
        return $this->belongsTo('App\Project');
    }
    public function Floor()
    {

        return $this->belongsTo('App\Floor','floor_id','id');
    }
    public function MOnthlyRents()
    {
        return $this->hasMany('App\MonthlyRent');
    }
    public function UnitStatus()
    {
        return $this->belongsTo('App\Status','status','id');
    }
}
