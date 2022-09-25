<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalUnit extends Model
{
    //

    public function Project()
    {
        return $this->belongsTo('App\Project');
    }
    public function Unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function Documents()
    {
        return $this->hasMany('App\Document');
    }
    public function Tenant()
    {
        return $this->belongsTo('App\Tenant','tenant_id','id');
    }
    public function Landlord()
    {
        return $this->belongsTo('App\Tenant','landlord_id','id');
    }
    public function Status()
    {
        return $this->belongsTo('App\Status','status','id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','updated_by','id');
    }



}
