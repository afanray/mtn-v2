<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputsTable extends Migration
{
    public function up()
    {
        Schema::create('rencana_aksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ro');
            $table->string('rincian_output');
            $table->string('kementerian_lembaga');
            $table->string('arah_kebijakan');
            $table->string('fokus_pelaksanaan');
            $table->string('strategi_terobosan');
            $table->string('bidang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rencana_aksi');
    }
}
