<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToppingPrice extends Model
{
    use HasFactory;
    protected $fillable = ['topping_id', 'size_id', 'price'];

    public function topping(){
        return $this->belongsTo(Topping::class);
    }

    public function size(){
        return $this->belongsTo(Size::class);
    }
}
