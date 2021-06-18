<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_nama');
            $table->integer('id_kelas');
            $table->integer('id_jurusan');
            $table->integer('id_bulan');
            $table->integer('keterangan_pembayaran');
            $table->integer('jumlah_bayar');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_records');
    }
}
