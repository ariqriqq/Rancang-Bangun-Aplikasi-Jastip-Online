<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jastiper', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jastiper');
            $table->string('no_hp_jastiper');
            $table->string('kota_jastiper');
            $table->string('alamat_jastiper');
            $table->string('ktp');
            $table->string('nama_rekening');
            $table->string('jenis_rekening');
            $table->string('nama_ewallet');
            $table->string('jenis_ewallet');
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
        Schema::dropIfExists('jastiper');
    }
};