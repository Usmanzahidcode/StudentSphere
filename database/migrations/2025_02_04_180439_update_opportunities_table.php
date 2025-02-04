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
        Schema::table('opportunities', function (Blueprint $table) {
            // Alter the status column to include 'under_review' as the default value
            $table->enum('status', ['under_review', 'open', 'close'])->default('under_review')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opportunities', function (Blueprint $table) {
            // Remove the default value and revert the column to its original state
            $table->enum('status', ['open', 'close'])->change();
        });
    }
};
