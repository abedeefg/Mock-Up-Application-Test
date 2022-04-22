<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pelatihan', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->integer('admin_id');
            $table->integer('biodata_id')->nullable();
            $table->string('nama_pelatihan');
            $table->enum('sertifikat',['Ada','Tidak Ada']);
            $table->string('tahun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pelatihan');
    }
}
