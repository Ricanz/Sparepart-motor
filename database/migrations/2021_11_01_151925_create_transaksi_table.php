<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->json('produk');
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->string('alamat');
            $table->string('ekspedisi');
            $table->string('ongkir');
            $table->string('code');
            $table->string('nama');
            $table->string('no_hp');
            $table->double('total_harga');
            $table->enum('status',['Belum Dibayar','Sudah Dibayar','Dikirim','Selesai','Dibatalkan','Dikemas']);
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
        Schema::dropIfExists('transaksi');
    }
}
