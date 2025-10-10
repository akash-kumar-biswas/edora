<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;
use App\Models\Student;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'amount' => $this->faker->randomFloat(2, 50, 500),
            'method' => 'manual',
            'txnid' => $this->faker->uuid(),
            'status' => 1,
        ];
    }
}
