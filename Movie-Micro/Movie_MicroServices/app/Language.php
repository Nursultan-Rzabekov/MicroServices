<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Film;
class Language extends Model
{
	
	protected $fillable = [
        'name'
    ];
    
    public function film()
    {
    	return $this->hasMany('App\Film');
  	}
}
