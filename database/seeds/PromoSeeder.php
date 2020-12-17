<?php

use App\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::create([
            'id_ruang' => 1,
            'harga_sewa' => 50000,
        ]);

        Promo::create([
            'id_ruang' => 4,
            'harga_sewa' => 20000,
        ]);
    }
}
