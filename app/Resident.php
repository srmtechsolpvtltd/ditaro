<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function residents()
    {
        return $this->belongsTo('App\Property');
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    }
}
