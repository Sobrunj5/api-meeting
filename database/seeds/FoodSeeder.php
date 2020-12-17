<?php

use App\Makanan;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        Makanan::create([
            'id_mitra' => 1,
            'nama' => 'rendang',
            'harga' => 15000,
            'deskripsi' => 'ini rendang lohh',
            'jenis' => 'bayar'
        ]);

        Makanan::create([
            'id_mitra' => 1,
            'nama' => 'susu',
            'harga' => 7000,
            'deskripsi' => 'ini susu lohh',
            'jenis' => 'gratis'
        ]);

        Makanan::create([
            'id_mitra' => 2,
            'nama' => 'lengko',
            'harga' => 7000,
            'deskripsi' => 'ini lengko lohh',
            'jenis' => 'bayar'
        ]);

        Makanan::create([
            'id_mitra' => 2,
            'nama' => 'wedang jahe',
            'harga' => 4000,
            'deskripsi' => 'ini wedang jahe lohh',
            'jenis' => 'bayar'
        ]);
    }


}
