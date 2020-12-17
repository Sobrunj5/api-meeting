<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ruang')->unsigned();
            $table->integer('id_mitra')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->double('harga');
            $table->double('total_bayar')->default(0);
            $table->string('snap_token')->nullable();
            $table->string('verifikasi')->default('1');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('id_ruang')->references('id')->on('ruang_meetings')->onDelete('CASCADE');
            $table->foreign('id_mitra')->references('id')->on('mitras')->onDelete('CASCADE');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
