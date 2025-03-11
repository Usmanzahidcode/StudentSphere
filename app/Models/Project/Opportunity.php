<?php

namespace App\Models\Project;

use App\Enums\Project\OpportunityStatus;
use App\Models\File;
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

    public function file(): MorphOne {
        return $this->morphOne(File::class, 'file_origin');
    }


    // Relationships

    public function applications(): HasMany {
        return $this->hasMany(Application::class);
    }

    public function project(): HasOne {
        return $this->hasOne(Project::class);
    }

    protected function casts(): array {
        return [
            'status' => OpportunityStatus::class,
        ];
    }
}
