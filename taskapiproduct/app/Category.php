<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];


    //protected $table = 'category';

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
