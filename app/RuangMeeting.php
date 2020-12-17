<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RuangMeeting extends Model
{
    protected $guarded =[];
    
    public function  mitra(){
        return $this->belongsTo( Mitra::class, 'id_mitra','id');
    }

    public function promo()
    {
        return $this->hasOne(Promo::class, 'id_ruang', 'id');
    }
}
