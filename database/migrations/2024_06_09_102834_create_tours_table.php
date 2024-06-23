<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('mr_mrs');
            $table->string('fullname');
            $table->string('nik')->unique();
            $table->string('gender');
            $table->string('place_birth');
            $table->date('date_birth');
            $table->string('no_passport');
            $table->date('date_issued');
            $table->date('date_expired');
            $table->string('issuing_office');
            $table->string('plane_number');
            $table->string('paket');
            $table->string('price');
            $table->string('dp');
            $table->string('diskon');
            $table->string('sisa_pembayaran');
            $table->string('sales_by');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
