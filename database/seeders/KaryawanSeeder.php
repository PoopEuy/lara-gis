<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKaryawan = [
            [
                'kode_karyawan ' => 'kryw001',
                'nama_karyawan' => 'Agung',
                'kode_cabang' => 'BGR',
                'kode_divisi' => 'GDNG',
                'kode_departemen' => 'GDNG'
            ],

            [
                'kode_karyawan ' => 'kryw002',
                'nama_karyawan' => 'Rahman',
                'kode_cabang' => 'BGR',
                'kode_divisi' => 'GDNG',
                'kode_departemen' => 'GDNG'
            ],
            
        ];

        foreach($dataKaryawan as $key => $val){
            Karyawan::create($val);
        }
    }
}
