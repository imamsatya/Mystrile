<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSewaAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa_alats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_barang');
            $table->string('kualitas_barang');
            $table->timestamps();
        });

        Schema::table('sewa_alats', function (Blueprint $table){
            $table->integer('set_id')->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('sewa_alats');
    }
}
