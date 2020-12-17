<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makanans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mitra')->unsigned();
            $table->string('nama', 50);
            $table->integer('harga')->nullable();
            $table->string('deskripsi');
            $table->text('foto')->nullable();
            $table->string('jenis');
            $table->boolean('status')->default(true);
            $table->timestamps();

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
        Schema::dropIfExists('makanans');
    }
}
