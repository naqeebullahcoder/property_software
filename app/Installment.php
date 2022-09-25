<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    public function Sales()
    {

        return $this->belongsTo('App\Sale','sale_id','id');
    }
    public function Units()
    {

        return $this->belongsTo('App\Unit','unit_id','id');
    }
    public function Tenants()
    {

        return $this->belongsTo('App\Tenant','tenant_id','id');
    }
    public function Users()
    {

        return $this->belongsTo('App\User','received_by','id');
    }
    public function Agents()
    {

        return $this->belongsTo('App\Tenant','agent_id','is_agent');
    }
}
