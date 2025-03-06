<?php

namespace App\Models\Project;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Application extends Model {
    protected $fillable = [
        'user_id',
        'opportunity_id',
        'body',
    ];

    // Relations
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function opportunity(): BelongsTo {
        return $this->belongsTo(Opportunity::class);
    }

    public function file(): MorphOne {
        return $this->morphOne(File::class, 'file_origin');
    }
}
