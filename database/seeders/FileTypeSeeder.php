<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTypeSeeder extends Seeder {
    public function run(): void
    {
        DB::table('file_types')->insert([
            ['name' => 'Document', 'extensions' => 'pdf,docx,txt', 'disk' => 'documents'],
            ['name' => 'Image', 'extensions' => 'jpg,png,gif,webp', 'disk' => 'images'],
            ['name' => 'Video', 'extensions' => 'mp4,mkv,avi', 'disk' => 'videos'],
            ['name' => 'Audio', 'extensions' => 'mp3,wav,aac', 'disk' => 'audio'],
        ]);
    }
}

