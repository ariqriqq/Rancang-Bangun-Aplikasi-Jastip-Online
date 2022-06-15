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
        Schema::table('jastiper', function (Blueprint $table) {
            $table->string('nomor_rekening')->after('jenis_rekening');
            $table->string('nomor_ewallet')->after('jenis_ewallet');
            $table->string('status')->after('nomor_ewallet')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jastiper', function (Blueprint $table) {
            //
        });
    }
};
