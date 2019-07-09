<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Actor;
class Film extends Model
{
    protected $fillable = [
        'Language_ID','Title','Description','Rating','Release_Year'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function language()
  	{
    	return $this->belongsTo('App\Language');
  	}


    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

}
