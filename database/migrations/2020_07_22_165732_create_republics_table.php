<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Cadastro de uma republica com suas demandas*/
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
            
            $table->string('nameRepublic')->default();
            $table->string('address')->default();
            $table->integer('bedroom')->default();
            $table->integer('telephoneRepublic')->default();
            $table->longText('description')->nullable();
            $table->string('acessibility')->nullable();
            $table->integer('bathroom')->default();
            $table->longText('rules')->nullable();
            $table->string('gender')->nullable();
            $table->string('facillity')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    
        Schema::table('republics',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
