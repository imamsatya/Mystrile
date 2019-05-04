<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJasaKonstruksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_konstruksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_jasa');
            $table->string('satuan_unit')->nullable();
            $table->timestamps();
        });

        Schema::table('jasa_konstruksis', function (Blueprint $table){
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
        Schema::dropIfExists('jasa_konstruksis');
    }
}
