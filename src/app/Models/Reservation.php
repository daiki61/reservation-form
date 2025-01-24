<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $primaryKey = 'reservation_id';
    protected $keyType = 'string';

    protected $fillable = ['reservation_id', 'user_id', 'shop_id', 'reservationDate', 'reservationTime', 'reservationNum',];
    protected $guarded = ['reservation_id', 'user_id',];
    //public static $rules = array(
        //'reservationDate' => 'required|date',
        //'reservationTime' => 'required',
        //'reservationNum' => 'required|integer|min:1',
        //'user_id' => 'required',
        //'shop_id' => 'required',
    //);


    public function getReservation(){
        return '予約'.
        $this->reservation_id . $this->reservationDate . $this->reservationTime . $this->reservationNum;
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'uuid', 'uuid');
    }
}