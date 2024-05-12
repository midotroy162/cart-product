<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartItems;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['id','content','key','userID'];
    public $incrementing = false;

    public function items () {
        return $this->hasMany('App\Models\CartItems', 'Cart_id');
    }
}
