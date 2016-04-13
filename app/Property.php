<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function residents()
    {
        return $this->hasMany('App\Resident');
    }

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }
    
     public function faq()
    {
        return $this->hasMany('App\Faq');
    }
}
