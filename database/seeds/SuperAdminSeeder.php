<?php

use App\SuperAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new SuperAdmin();
        $admin->nama     = 'Sobrun';
        $admin->no_hp    = '083861627290';
        $admin->email    = 'sobrunj@gmail.com';
        $admin->password =  Hash::make('123456789');
        $admin->save();

    }
}
