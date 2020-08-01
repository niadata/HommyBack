<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('republics_id');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();
        });
        Schema::table('republics_user', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('republics_id')->references('id')->on('republics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republic_user');
    }
}
