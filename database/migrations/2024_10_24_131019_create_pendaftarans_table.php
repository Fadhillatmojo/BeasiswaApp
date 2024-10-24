<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('nomor_hp');
            $table->integer('semester');
            $table->float('ipk'); // IPK disimpan sebagai float
            $table->string('beasiswa')->nullable(); // Pilihan beasiswa bisa null jika IPK < 3
            $table->string('berkas')->nullable(); // Berkas yang diupload
            $table->string('status_ajuan')->default('belum diverifikasi'); // Status Ajuan default 'belum diverifikasi'
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
}
