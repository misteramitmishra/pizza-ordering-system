<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function pizzaPrices(){
        return $this->hasMany(PizzaPrice::class);
    }

    public function toppingPrices(){
        return $this->hasMany(ToppingPrice::class);
    }
}
