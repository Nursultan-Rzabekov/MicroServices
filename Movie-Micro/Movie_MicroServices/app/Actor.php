<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'First_Name','Last_Name','Age'
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
