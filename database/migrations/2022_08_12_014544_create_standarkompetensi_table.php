<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandarkompetensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standarkompetensi', function (Blueprint $table) {
            $table->id();
            $table->string('standarkompetensi', 200);
            $table->unsignedBigInteger('kdbidstudi');
            $table->foreign('kdbidstudi')->references('id')->on('bidangstudi')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('standarkompetensi');
    }
}
