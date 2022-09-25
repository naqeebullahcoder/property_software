<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    public function Units()
    {

        return $this->belongsTo('App\Unit','unit_id','id');
    }
    public function Tenants()
    {

        return $this->belongsTo('App\Tenant','tenant_id','id');
    }
    public function Agents()
    {

        return $this->belongsTo('App\Tenant','agent_id','id');
    }
    public function Installments()
    {
        return $this->hasMany('App\Installment','sale_id','id');
    }
    public function Status()
    {
        return $this->belongsTo('App\Status','status','id');
    }


}
