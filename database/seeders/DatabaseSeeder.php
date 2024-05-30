<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make("manager"),
            'role' => 0
        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("admin"),
            'role' => 1
        ]);
        User::factory()->create([
            'name' => 'SSHE',
            'email' => 'sshe@gmail.com',
            'password' => Hash::make("sshe"),
            'role' => 2
        ]);
        User::factory()->create([
            'name' => 'Koordinator',
            'email' => 'koordinator@gmail.com',
            'password' => Hash::make("koordinator"),
            'role' => 3
        ]);

        $this->call(CompetencySeeder::class);
        $this->call(WorkerSeeder::class);
        $this->call(WorkerCompetencySeeder::class);


    }
}
