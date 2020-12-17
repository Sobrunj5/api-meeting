<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function ruang(){
        return $this->belongsTo(RuangMeeting::class,'id_ruang','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function makanans()
    {
        return $this->hasMany(OrderMakanan::class, 'id_booking', 'id');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra', 'id');
    }
}
