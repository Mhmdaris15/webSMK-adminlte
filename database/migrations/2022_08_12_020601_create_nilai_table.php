<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idsiswa');
            $table->unsignedBigInteger('kdguru');
            $table->unsignedBigInteger('kdmapel');
            $table->string('namates', 200);
            $table->decimal('nilai', 4, 2);
            $table->foreign('idsiswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kdguru')->references('id')->on('guru')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kdmapel')->references('id')->on('mapel')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('nilai');
    }
}
