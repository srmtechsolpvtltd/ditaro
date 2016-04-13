<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
	//use SoftDeletes;

   // protected $dates = ['deleted_at'];
	protected $table = 'faq';

    protected $fillable = ['property_id', 'title', 'description'];

     public function property()
    {
        return $this->belongsTo('App\Property');
    }


   
}
