<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => '3120500011.jpg',
            'id_number' => rand(10000,100000),
            'name' => fake()->name(),
            'active_status' => 'Active',
            'gender' => rand(0, 1) ? 'Male' : 'Female',
            'phone' => '08'.rand(1000000000, 1999999999),
            'education' => '-',
            'address' => '-',
            'employee_status' => 'Active',
            'departement' => '-',
            'ssw_status' => 'SSW',
            'mcu_note' => '-',
            'supervisor_name' => '-',
            'starting_date_work' => date('Y-m-d'),
            'end_date_work' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'),
            'verified_sshe' => 1,
        ];
    }
}
