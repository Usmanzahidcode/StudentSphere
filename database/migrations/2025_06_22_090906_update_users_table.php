<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('linkedin')->nullable()->change();
            $table->string('github')->nullable()->change();
            $table->string('personal_site')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('linkedin')->nullable(false)->change();
            $table->string('github')->nullable(false)->change();
            $table->string('personal_site')->nullable(false)->change();
        });
    }
};
