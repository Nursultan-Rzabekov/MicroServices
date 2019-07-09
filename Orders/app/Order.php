<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order extends Model
{
    const CANCEL = 2;
    const PAY = 3;

    public function products(){
    	return $this->belongsToMany(Product::class);
    }


    public function cancel(){
    	$this->status = $this::CANCEL;
    	return $this;
    }

    public function pay(){
    	$this->status = $this::PAY;
    	return $this;
    }
}
