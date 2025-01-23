<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';
    protected $fillable = ['name', 'place', 'genre', 'feature', 'image', 'shop_id'];
    protected $primaryKey = 'shop_id';

    //public $incrementing = true;
   
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}