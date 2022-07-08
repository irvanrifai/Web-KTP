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
            $table->string('foto', 255);
            $table->bigInteger('NIK');
            $table->string('nama', 255);
            $table->string('tm_lahir', 150);
            $table->date('tgl_lahir');
            $table->string('jk', 25);
            $table->string('agama', 30);
            $table->string('status', 50);
            $table->string('goldar', 4);
            $table->string('pekerjaan', 50);
            $table->string('wn', 30);
            $table->string('provinsi', 150);
            $table->string('kab', 150);
            $table->string('kec', 150);
            $table->string('kel', 150);
            $table->string('rt', 150);
            $table->string('rw', 150);
            $table->string('add', 255);
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
