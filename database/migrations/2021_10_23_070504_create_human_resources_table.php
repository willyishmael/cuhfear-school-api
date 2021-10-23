<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('human_resources', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 10);
            $table->string('nip')->unique();
            $table->string('tanggal_lahir');
            $table->string('peran', 20);
            $table->string('jabatan', 20);
            $table->string('foto');
            $table->timestampsTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('human_resources');
    }
}
