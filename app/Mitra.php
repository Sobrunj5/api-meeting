<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mitra extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $quard ='adminmitra';
    protected $table ='mitras';


    protected $fillable = [
        'nama_mitra',
        'email',
        'password',
        'no_hp',
        'nama_pemilik',
        'nama_bank',
        'nomor_rekening',
        'nama_akun_bank',
        'alamat',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function makanans()
    {
        return $this->hasMany(Makanan::class, 'id_mitra', 'id');
    }

    public function profile()
    {
        return $this->hasOne(MitraProfile::class, 'id_mitra', 'id');
    }
}
