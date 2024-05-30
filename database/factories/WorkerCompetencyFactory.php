<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkerCompetency>
 */
class WorkerCompetencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'worker_id' => rand(1, 200),
            'competency_id' => rand(1, 82),
            'certification_institute' => '-',
            'effective_date' => date('Y-m-d H:i:s'), 
            'expiration_date' => date('Y-m-d H:i:s'),
            'update_status' => '-',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'),
            'verification_status' => '1',
        ];
    }
}
