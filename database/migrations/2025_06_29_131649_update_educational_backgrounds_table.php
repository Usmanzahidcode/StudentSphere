<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {
    public function up(): void {
        Schema::table('educational_backgrounds', function (Blueprint $table) {
            $table->string('field_of_study')->nullable()->change();
        });
    }

    public function down(): void {
        Schema::table('educational_backgrounds', function (Blueprint $table) {
            $table->string('field_of_study')->nullable(false)->change();
        });
    }
};
