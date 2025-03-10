<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->enum('status', ['under_review', 'open', 'closed'])->change();
        });
    }

    public function down(): void {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->enum('status', ['under_review', 'open', 'close'])->change();
        });
    }
};
