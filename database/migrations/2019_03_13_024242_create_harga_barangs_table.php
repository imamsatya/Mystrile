<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargaBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_barang');
            $table->string('kualitas_barang')->nullable();
            $table->string('satuan_standar')->nullable();
            $table->string('merk')->nullable();
            $table->string('harga_satuan_setempat')->nullable();
            $table->string('harga_satuan_standar')->nullable();
            $table->timestamps();
        });

        Schema::table('harga_barangs', function (Blueprint $table){
            $table->integer('set_id')->unsigned()->nullable();
            $table->foreign('set_id')->references('id')->on('set_atributs');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harga_barangs');
    }
}
