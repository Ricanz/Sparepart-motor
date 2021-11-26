<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuktiPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId("transaksi_id")->constrained("transaksi")->onDelete("cascade")->onUpdate("cascade");
            $table->integer('bukti');
            $table->enum('status', ['Approved', 'Progress', 'Cancel']);
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
        Schema::dropIfExists('bukti_pembayaran');
    }
}
