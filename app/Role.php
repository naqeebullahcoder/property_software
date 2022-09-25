<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function menuoptions()
    {
        return $this->belongsToMany(MenuOPtion::class,'menu_options_role','role_id','menu_option_id');
    }
    public function rights()
    {
        return $this->hasMany('App\Rights','role_id','id');
    }

    public function rightss()
    {
        return $this->belongsToMany('App\Rights','Rights','menu');
    }

}
