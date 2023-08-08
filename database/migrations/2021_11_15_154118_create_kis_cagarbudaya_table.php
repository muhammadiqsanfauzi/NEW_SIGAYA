<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKisCagarbudayaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kis_cagarbudaya', function (Blueprint $table) {
            $table->id();
            $table->string('id_objek');
            $table->string('jenis_objek_id');
            $table->string('nama_objek');
            $table->string('kode_alamat');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('keterangan');
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
        Schema::dropIfExists('kis_cagarbudaya');
    }
}
