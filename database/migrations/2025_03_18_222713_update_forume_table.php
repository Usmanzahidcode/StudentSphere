<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('forum_posts', function (Blueprint $table) {
            $table->enum('status', ['under_review', 'published'])
                ->default('under_review')
            ->after('content');
        });
    }

    public function down(): void
    {
        //
    }
};
