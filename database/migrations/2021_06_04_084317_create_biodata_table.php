<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('biodata');
    }
}
