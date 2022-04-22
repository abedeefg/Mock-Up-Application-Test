<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');

            $table->integer('admin_id');
            $table->integer('biodata_id')->nullable();
            $table->string('jenjang_pendidikan_terakhir');
            $table->string('nama_institusi');
            $table->string('jurusan');
            $table->string('tahun_lulus');
            $table->string('ipk');
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
        Schema::dropIfExists('pendidikan');
    }
}
