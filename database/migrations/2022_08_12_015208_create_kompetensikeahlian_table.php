<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKompetensikeahlianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompetensikeahlian', function (Blueprint $table) {
            $table->id();
            $table->string('kompetensikeahlian', 100);
            $table->unsignedBigInteger('kdstandkomp');
            $table->foreign('kdstandkomp')->references('id')->on('standarkompetensi')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kompetensikeahlian');
    }
}
