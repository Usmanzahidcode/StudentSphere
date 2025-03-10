<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function applications(): HasMany {
        return $this->hasMany(Application::class);
    }

    public function project(): HasOne {
        return $this->hasOne(Project::class);
    }
}
