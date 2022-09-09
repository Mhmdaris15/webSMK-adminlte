<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nip_nuptk', 20)->unique();
            $table->string('namaguru', 30);
            $table->string('notelp', 15);
            $table->enum('jk', ['L', 'P']);
            $table->text('alamat');
            $table->enum('agama', ['I', 'H', 'B', 'K', 'P', 'L']);
            $table->string('gelardepan', 10);
            $table->string('gelarbelakang', 10);
            $table->string('namapt', 200);
            $table->string('tahunlulus', 4);
            $table->string('tempatlahir', 50);
            $table->date('tgllahir');
            $table->string('foto', 255);
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
        Schema::dropIfExists('guru');
    }
}
