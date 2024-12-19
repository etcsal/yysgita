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
        Schema::table('kandidats', function (Blueprint $table) {
            $table->boolean('is_winner')->default(false); // Add the new 'is_winner' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kandidats', function (Blueprint $table) {
            $table->dropColumn('is_winner'); // Drop the column if needed
        });
    }
};
