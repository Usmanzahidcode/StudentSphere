<?php

namespace App\Traits;


use App\Enums\User\UserRole;
use App\Models\User\Role;

trait HasRoles {
    public function assignRole(UserRole $roleName): void {
        $role = Role::firstOrCreate(['name' => $roleName]);
        $this->roles()->syncWithoutDetaching([$role->id]);
    }

    public function removeRole(UserRole $roleName): void {
        $role = Role::where('name', $roleName)->first();
        if ($role) {
            $this->roles()->detach($role->id);
        }
    }

    public function isAdmin(): bool {
        return $this->hasRole(UserRole::ADMIN);
    }

    public function hasRole(UserRole $role): bool {
        return $this->roles()->where('name', $role)->exists();
    }

    public function isStudent(): bool {
        return $this->hasRole(UserRole::STUDENT);
    }
}
