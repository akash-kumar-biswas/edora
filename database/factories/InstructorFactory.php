<?php

namespace Database\Factories;

use App\Models\Instructor;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class InstructorFactory extends Factory
{
    protected $model = Instructor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'role_id' => Role::where('name', 'Instructor')->first()->id ?? 2, // default role_id = 2 if not exists
            'bio' => $this->faker->paragraph(),
            'image' => null,
            'status' => 1,
            'password' => Hash::make('password123'),
        ];
    }
}
