<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mitra')->unsigned();
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->text('alamat')->nullable();
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();

            $table->foreign('id_mitra')->references('id')->on('mitras')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitra_profiles');
    }
}
