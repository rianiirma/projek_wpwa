<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->constrained('anggota')->onDelete('cascade');
            $table->enum('jabatan', ['ketua', 'sekretaris', 'bendahara', 'anggota']);
            $table->string('periode');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengurus');
    }
};
