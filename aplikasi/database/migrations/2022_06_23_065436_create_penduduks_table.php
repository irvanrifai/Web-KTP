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
            $table->id()->index();
            $table->char('foto');
            $table->integer('NIK', 16)->unique();
            $table->text('nama', 255);
            $table->char('tm_lahir', 150);
            $table->date('tgl_lahir');
            $table->text('jk', 25);
            $table->text('agama', 30);
            $table->text('status', 50);
            $table->text('goldar', 4);
            $table->text('pekerjaan', 50);
            $table->text('wn', 30);
            $table->text('provinsi', 150);
            $table->text('kab', 150);
            $table->text('kec', 150);
            $table->text('kel', 150);
            $table->text('rt', 150);
            $table->text('rw', 150);
            $table->text('add', 255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
