<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Project\Opportunity;
use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'email',
        'password',
        'linkedin',
        'github',
        'personal_site',
        'email_verified_at',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function educationalBackground(): HasOne {
        return $this->hasOne(EducationalBackground::class);
    }

    // Relations

    public function opportunities(): HasMany {
        return $this->hasMany(Opportunity::class);
    }

    public function projects(): HasMany {
        return $this->hasMany(Project::class);
    }

    public function participatedProjects(): BelongsToMany {
        return $this->belongsToMany(Project::class, 'project_members');
    }

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
