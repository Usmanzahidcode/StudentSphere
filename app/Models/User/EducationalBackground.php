<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationalBackground extends Model {
    protected $fillable = [
        'institution',
        'degree',
        'field_of_study',
        'date_of_completion',
    ];


    // Relations
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
