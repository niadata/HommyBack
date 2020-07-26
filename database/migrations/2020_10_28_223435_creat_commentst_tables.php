<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatCommentstTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Cadastro de um comentário com suas demandas*/
        Schema::create('commentary', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->longText('commentary')->nullable();
            $table->boolean('like')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
