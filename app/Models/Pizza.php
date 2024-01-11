<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'status'];

    public function prices() {
        return $this->hasMany(PizzaPrice::class);
    }
}
