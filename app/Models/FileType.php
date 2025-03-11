<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FileType extends Model
{
    protected $fillable = [
        'name',
        'extensions'
    ];

    public function files(): HasMany {
        return $this->hasMany(File::class);
    }
}

