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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('jasa_id');
            $table->integer('jastiper_id');
            $table->integer('customer_id');
            $table->integer('payment_id')->nullable();
            $table->string('status');
            $table->string('kurir');
            $table->string('metode_pembayaran');
            $table->string('pesanan');
            $table->string('jumlah');
            $table->string('satuan');
            $table->string('deskripsi');
            $table->string('total_harga')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
