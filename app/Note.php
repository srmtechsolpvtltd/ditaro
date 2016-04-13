<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function resident()
    {
        return $this->belongsTo('App\Resident');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function Note()
    {
        return $this->belongsTo('App\Property');
    }
}
