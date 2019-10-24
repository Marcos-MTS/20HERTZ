<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicadores', function (Blueprint $table) {
         
            $table->bigIncrements('id');
            $table->string('nome_p');
            $table->string('email_p')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password_p');
            $table->string('image');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicadores');
    }
}
