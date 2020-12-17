<?php

use App\MitraProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeeder::class);
        $this->call(MitraSeeder::class);
        $this->call(FoodSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(PromoSeeder::class);

    }
}