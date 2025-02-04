<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Opportunity extends Model {
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'status',
    ];


    // Relationships
    public function file(): MorphOne {
        return $this->morphOne(File::class, 'file_origin');
    }
}
