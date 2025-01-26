<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bagian;
use App\Models\Seksi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Bagian::insert([
            ['nama' => 'TUK'],
            ['nama' => 'Tanaman'],
            ['nama' => 'Teknik'],
            ['nama' => 'Pabrikasi'],
            ['nama' => 'QC'],
        ]);

        Seksi::insert([
            ['nama' => 'Personalia, Umum, Gudang Perlengkapan', 'bagian_id' => 1],
            ['nama' => 'Akunting, PDE, Logistik', 'bagian_id' => 1],
        ]);
    }
}
