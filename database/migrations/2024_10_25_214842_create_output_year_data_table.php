<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputYearDataTable extends Migration
{
    public function up()
    {
        Schema::create('rencana_aksi_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rencana_aksi_id')->constrained('rencana_aksi')->onDelete('cascade');
            $table->year('tahun');
            $table->integer('target');
            $table->integer('capaian');
            $table->decimal('alokasi_anggaran', 15, 2);
            $table->decimal('realisasi_anggaran', 15, 2);
            $table->text('tantangan_pelaksanaan');
            $table->text('strategi_pelaksanaan');
            $table->string('status_pelaksanaan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rencana_aksi_detail');
    }
}
