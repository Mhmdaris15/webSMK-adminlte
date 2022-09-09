<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 15)->unique();
            $table->string('namasiswa', 30);
            $table->string('nisn', 15);
            $table->string('alamatsiswa', 300);
            $table->string('telpsiswa', 15);
            $table->enum('agamasiswa', ['I', 'H', 'B', 'K', 'P', 'L']);
            $table->string('asalsekolah', 50);
            $table->enum('jksiswa', ['L', 'P']);
            $table->string('tempatlahirsiswa', 50);
            $table->date('tgllahirsiswa');
            $table->enum('statanak', ['K', 'A']);
            $table->string('anakke', 2);
            $table->date('tglditerima');
            $table->string('dikelas', 3);
            $table->string('ayah', 30);
            $table->string('ibu', 30);
            $table->string('pekerjaanayah', 50);
            $table->string('pekerjaanibu', 50);
            $table->string('telpayah', 15);
            $table->string('telpibu', 15);
            $table->string('alamatayah', 300);
            $table->string('alamatibu', 15);
            $table->enum('agamaayah', ['I', 'H', 'B', 'K', 'P', 'L']);
            $table->enum('agamaibu', ['I', 'H', 'B', 'K', 'P', 'L']);
            $table->string('photo', 255);
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
        Schema::dropIfExists('siswa');
    }
}
