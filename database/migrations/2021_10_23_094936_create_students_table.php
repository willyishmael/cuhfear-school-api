<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 20);
            $table->string('nisn', 20)->unique();
            $table->date('tanggal_lahir');
            $table->string('jurusan', 20);
            $table->year('tahun_masuk');
            $table->string('jabatan')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
