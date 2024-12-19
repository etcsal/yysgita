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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // References user ID who voted
            $table->foreignId('kandidat_id')->constrained('kandidats')->onDelete('cascade'); // References kandidat ID being voted for
            $table->timestamps(); // Tracks when the vote was cast
        
            $table->unique(['user_id', 'kandidat_id']); // Ensures each user can only vote once for each kandidat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
        
    }
};
