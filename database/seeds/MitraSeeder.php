<?php

use App\Mitra;
use App\MitraProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bigberry = Mitra::create([
            'nama_mitra' => 'BigBerry',
            'email' => 'bigberry@gmail.com',
            'password' => Hash::make('12345678'),
            'no_hp' => '08933628399'
        ]);

        MitraProfile::create([
            'id_mitra' => 1,
            'jam_buka' => '08:00',
            'jam_tutup' => '20:00'
        ]);

        $tradisine = Mitra::create([
            'nama_mitra' => 'Tradisine Kopi',
            'email' => 'tradisinekopi@gmail.com',
            'password' => Hash::make('12345678'),
            'no_hp' => '08933628391'
        ]);

        MitraProfile::create([
            'id_mitra' => 2,
            'jam_buka' => '10:00',
            'jam_tutup' => '22:00'
        ]);

        $karlita = Mitra::create([
            'nama_mitra' => 'Karlita',
            'email' => 'karlita@gmail.com',
            'password' => Hash::make('12345678'),
            'no_hp' => '08933628390'
        ]);

        MitraProfile::create([
            'id_mitra' => 3,
            'jam_buka' => '12:00',
            'jam_tutup' => '22:00'
        ]);
    }
}
