<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->enum('jalur_pendaftaran', ['zonasi','afirmasi','prestasi','perpindahan_tugas']);
            $table->year('tahun_daftar');
            $table->string('nama', 50);
            $table->enum('jenis_kelamin', ['laki-laki','perempuan']);
            $table->string('tempat_lahir', 20);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->string('nama_wali');
            $table->string('nomor_telepon_wali');
            $table->string('asal_sekolah');
            $table->string('kartu_keluarga');
            $table->string('sc_jarak_rumah')->nullable();
            $table->string('sk_domisili');
            $table->string('sk_lulus');
            $table->string('sk_tidak_mampu')->nullable();
            $table->string('sk_pindah_tugas')->nullable();
            $table->string('sertifikat_prestasi')->nullable();
            $table->string('sp_keabsahan_dokumen');
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
        Schema::dropIfExists('student_registrations');
    }
}
