<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'patient_name' => $this->faker->name(),
            'patient_phone' => $this->faker->phoneNumber(),
            'appointment_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'reason' => $this->faker->sentence(3),
            'status' => $this->faker->randomElement(['pendiente', 'completada', 'cancelada']),
        ];
    }
}