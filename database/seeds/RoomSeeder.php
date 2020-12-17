<?php

use App\RuangMeeting;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RuangMeeting::create([
            'id_mitra' => 1,
            'nama_tempat' => 'ruangan 1',
            'kapasitas' => 50,
            'harga_sewa' => 100000,
            'keterangan' => 'good'
        ]);

        RuangMeeting::create([
            'id_mitra' => 1,
            'nama_tempat' => 'ruangan 2',
            'kapasitas' => 20,
            'harga_sewa' => 70000,
            'keterangan' => 'slime'
        ]);

        RuangMeeting::create([
            'id_mitra' => 1,
            'nama_tempat' => 'ruangan 3',
            'kapasitas' => 10,
            'harga_sewa' => 60000,
            'keterangan' => 'good'
        ]);

        RuangMeeting::create([
            'id_mitra' => 2,
            'nama_tempat' => 'ruangan 1',
            'kapasitas' => 90,
            'harga_sewa' => 900000,
            'keterangan' => 'good'
        ]);

        RuangMeeting::create([
            'id_mitra' => 2,
            'nama_tempat' => 'ruangan 2',
            'kapasitas' => 40,
            'harga_sewa' => 300000,
            'keterangan' => 'good'
        ]);
    }
}
