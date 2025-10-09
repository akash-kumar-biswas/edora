<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;

class InstructorSeeder extends Seeder
{
    public function run(): void
    {
        // Default instructor
        Instructor::create([
            'name' => 'Default Instructor',
            'email' => 'instructor@example.com',
            'role_id' => 2, // Assuming 2 = Instructor role
            'password' => bcrypt('instructor123'),
            'status' => 1,
        ]);

        // Generate 10 random instructors
        Instructor::factory()->count(10)->create();
    }
}
