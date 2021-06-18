<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('nisn')->nullable();
            $table->integer('nis')->nullable();
            $table->integer('id_kelas');
            $table->integer('id_jurusan');
            $table->string('password');
            $table->string('role')->nullable()->default('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
}
