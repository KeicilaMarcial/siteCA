<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_membros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('foto',100)->nullable();
            $table->integer('status');//0 -> inativo, 1->ativo
            $table->BigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('foto_membros');
    }
}
