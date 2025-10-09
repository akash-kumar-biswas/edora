<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            ['name' => 'Admin', 'description' => 'Full access to platform'],
            ['name' => 'Instructor', 'description' => 'Can create and manage courses'],
            ['name' => 'Student', 'description' => 'Can enroll and attend courses'],
        ]);
    }
}
