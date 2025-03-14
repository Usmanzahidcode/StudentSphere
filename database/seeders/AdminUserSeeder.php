<?php

namespace Database\Seeders;

use App\Enums\User\UserRole;
use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder {
    public function run(): void {
        $adminRole = Role::firstOrCreate(['name' => UserRole::ADMIN]);

        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'dob' => Carbon::now()->subYears(30),
                'gender' => 'male',
                'password' => Hash::make('password'),
                'linkedin' => 'https://linkedin.com/in/admin',
                'github' => 'https://github.com/admin',
                'personal_site' => 'https://admin.com',
                'email_verified_at' => now(),
                'status' => 'active', // Default status
            ]
        );

        if (!$admin->roles()->where('name', UserRole::ADMIN)->exists()) {
            $admin->roles()->attach($adminRole->id);
        }
    }
}
