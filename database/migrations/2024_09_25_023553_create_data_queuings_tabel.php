<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_queuings', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi');
            $table->enum('jenis_antrian', ['GR', 'BP']);
            $table->timestamp('waktu_pengambilan');
            $table->timestamp('waktu_pemanggilan')->nullable();
            $table->enum('status', ['waiting', 'called'])->default('waiting');
            $table->integer('nomor_antrian')->nullable();
            $table->timestamps();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_queuings');
    }
};
