<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'city_id' => City::factory(),
        ];
    }
} 