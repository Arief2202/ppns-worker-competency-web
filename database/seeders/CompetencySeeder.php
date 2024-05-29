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
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Hiperkes Dokter Perusahaan'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Hiperkes Paramedis'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Petugas P3K'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Juru Las Kelas I'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Juru Las Kelas II'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Juru Las Kelas III'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Teknisi Pesawat Angkat dan Angkut'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Operator Pesawat Angkat dan Angkut'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Pelatihan Juru Ikat (Rigger)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Ahli K3 Bidang Pesawat Angkat dan Pesawat Angkut'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Operator K3 Produksi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Teknisi K3 Produksi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Teknisi K3 Elevator dan Eskalator'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Operator K3 Elevator dan Eskalator'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'TKBT Tingkat 1'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'TKBT Tingkat 2'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'TKPK Tingkat 1'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'TKPK Tingkat 2'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'TKPK Tingkat 3'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'K3 Supervisi (Pengawas) Perancah'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'K3 Teknisi Perancah'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Pelatihan Pipe Fitter'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Authorized Gas Tester Training BNSP'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Teknisi Deteksi Gas Ruang Terbatas'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Petugas K3 Penyelamat Ruang Terbatas'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Operator K3 Teknisi Bejana Tekan'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Teknisi Bejana Tekan'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Basic Sea Survival'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Distribusi Gas Alam dan Buatan untuk Non Pipa'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Fluida Pemboran, Komplesi, dan Kerja Ulang Sumur'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Inspektur Bahan Peledak'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Inspektur Bejana Tekan'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Inspektur Instalasi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Inspektur Kelistrikan'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Inspektur Pesawat Angkat'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Inspektur Pipa Penyalur'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Inspektur Rig'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Inspektur Tangki'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Instrumentasi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Laboratorium Pengujian'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Operasi Boiler'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Operasi Produksi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Operasi Serah Terima Bahan Bakar Cair di Dermaga (Loading Master)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Operasi Vacuum Distilling Unit Pengelolaan Minyak Bumi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Pemboran'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Pemrosesan Gas Bumi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Penanganan Gas H2S'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Penanganan Mutu Bahan Bakar dan Pelumas Penerbangan (Aviator)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Pengelasan Bawah Air'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Pengelola Sarana Pengisian dan Penyaluran LPG (SPPLPG)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Penyelidikan Seismik'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Perawatan Mekanik'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Perawatan Sumur'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Operator Unit Blending'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Petugas Pengambilan Contoh'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Petugas Pengukur Isi Tangki Darat Minyak Bumi dan Produk Minyak Bumi Cair'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Pressure Relieve Device (PRD)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Bidang Operasi Scaffolding'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Bidang Sistem Manajemen Lingkungan (SML)'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Bidang Teknik Listrik Migas'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Bidang Petugas Teknisi Operasi Crude Distilling Unit Pengolahan Minyak Bumi'],
            ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'competency_name' => 'Bidang Wellsite Geology']
        ]
        );
    }
}
