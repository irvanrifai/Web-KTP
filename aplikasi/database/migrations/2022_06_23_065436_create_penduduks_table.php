<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('foto', 255)->nullable();
            $table->bigInteger('NIK');
            $table->string('nama', 255);
            $table->string('tm_lahir', 150);
            $table->date('tgl_lahir');
            $table->string('jk', 25);
            $table->string('agama', 30)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('goldar', 4)->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('wn', 30)->nullable();
            $table->string('provinsi', 150)->nullable();
            $table->string('kab', 150)->nullable();
            $table->string('kec', 150)->nullable();
            $table->string('kel', 150)->nullable();
            $table->string('rt', 150)->nullable();
            $table->string('rw', 150)->nullable();
            $table->string('add', 255)->nullable();
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
        Schema::dropIfExists('penduduks');
    }
}
