<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competency;

class CompetencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competency::insert([
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Umum (Kemenaker)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli Utama K3 Konstruksi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli Madya K3 Konstruksi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli Muda Konstruksi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Umum (BNSP)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Migas'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Kebakaran'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Petugas peran kebakaran'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Regu penanggulangan kebakaran'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Koordinator unit penanggulangan kabakaran'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Muda Lingkungan Kerja'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Madya Lingkungan Kerja'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Senior Lingkungan Kerja'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Utama Lingkungan Kerja'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Listrik'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Kimia'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Petugas K3 Kimia'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Petugas K3 Kebakaran Paket C (Tingkat dasar II)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Petugas K3 Kebakaran Paket B (Tingkat Ahli Pratama)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Petugas K3 Kebakaran Paket A (Tingkat Ahli Madya)'],
        ]
        );
    }
}
