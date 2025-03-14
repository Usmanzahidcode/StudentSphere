<?php

namespace Database\Seeders;

use App\Enums\User\UserRole;
use App\Models\User\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {
    public function run(): void {
        collect(UserRole::cases())->each(fn($role) => Role::firstOrCreate(['name' => $role->value]));
    }
}
