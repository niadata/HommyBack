<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Cadastro de um locador com suas demandas*/
        Schema::create('locadors', function (Blueprint $table) {
            $table->id();
            $table->string('gender')->nullable();
            $table->string('cpf')->unique();
            $table->string('telephone')->default();
            $table->string('deficient')->nullable();
            $table->unsignedBigInteger('republic_id')->nullable();
            $table->timestamps();
        });
        Schema::table('locadors', function (Blueprint $table) {
            $table->foreign('republic_id')->references('id')->on('republics')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locadors');
    }
}
