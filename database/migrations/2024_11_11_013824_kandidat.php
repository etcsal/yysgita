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
        Schema::create('kandidats', function (Blueprint $table) {
            $table->id('id'); // Auto incrementing primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('votes_count')->default(0);
            $table->string('bulan', 100);
            $table->string('tahun', 100);
            $table->string('nama_kandidat', 100);
            $table->string('email')->unique();
            $table->string('foto_kandidat', 100);
            $table->string('pendidikan', 100);
            $table->string('pekerjaan', 100);
            $table->string('tinggi_badan', 10);
            $table->string('berat_badan', 10);
            $table->string('bahasa', 25);
            $table->string('kebudayaan', 25);
            $table->string('musik', 25);
            $table->string('pengetahuan', 25);
            $table->enum('approve', ['Proces', 'Tolak', 'Terima'])->default('Proces'); // ENUM column with default value
            $table->boolean('is_winner')->default(false); // Add the new 'is_winner' column
            $table->timestamps(); // Creates created_at and updated_at fields

            $table->unique(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kandidats');
    }
};
