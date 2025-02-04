<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->string('mime_type');
            $table->unsignedBigInteger('size');
            $table->foreignId('file_type_id')->constrained();

            $table->morphs('file_origin');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('files');
    }
};

