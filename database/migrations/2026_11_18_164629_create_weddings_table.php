<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('slug')->unique()->nullable(); // Tautan unik undangan[cite: 5, 7]

            // Card 1: Data Kedua Mempelai
            $table->string('groom_name')->nullable();       // Nama Lengkap & Gelar (Pria)
            $table->string('groom_nickname')->nullable();   // Nama Panggilan (Pria)[cite: 1]
            $table->string('groom_parents')->nullable();    // Nama Orang Tua / Wali (Pria)[cite: 1]
            $table->string('bride_name')->nullable();       // Nama Lengkap & Gelar (Wanita)[cite: 1]
            $table->string('bride_nickname')->nullable();   // Nama Panggilan (Wanita)[cite: 1]
            $table->string('bride_parents')->nullable();    // Nama Orang Tua / Wali (Wanita)[cite: 1]

            // Card 2: Waktu dan Lokasi Acara - Akad Nikah / Pemberkatan[cite: 1]
            $table->date('akad_date')->nullable();
            $table->time('akad_start_time')->nullable();
            $table->time('akad_end_time')->nullable();
            $table->string('akad_venue')->nullable();
            $table->text('akad_address')->nullable();
            $table->string('akad_maps_url')->nullable();

            // Card 2: Waktu dan Lokasi Acara - Resepsi Pernikahan[cite: 1]
            $table->date('resepsi_date')->nullable();
            $table->time('resepsi_start_time')->nullable();
            $table->time('resepsi_end_time')->nullable();
            $table->string('resepsi_venue')->nullable();
            $table->text('resepsi_address')->nullable();
            $table->string('resepsi_maps_url')->nullable();

            // Card 3: Catatan Tambahan & Ketentuan[cite: 1]
            $table->string('dresscode')->nullable();        // Panduan Dresscode[cite: 1]
            $table->text('additional_notes')->nullable();   // Ketentuan[cite: 1]

            // Card 4: Love Story (Opsional)[cite: 5, 7]
            $table->json('love_stories')->nullable();

            // Card 5: Unggah Foto[cite: 1]
            $table->json('gallery_photos')->nullable();

            // Card 6: Pilih Template Design Undangan[cite: 1]
            $table->string('template')->default('whimsical'); // whimsical | minimalist[cite: 1]

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};