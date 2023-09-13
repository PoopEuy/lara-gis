<?php

namespace Database\Seeders;

use App\Models\Koordinat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KoordinatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKoordinat = [
            [
                'nama_tempat' => 'Titik A',
                'latitude' => '106.79426649826837',
                'longitude' => '-6.594599882859683',
                'image' => 'koordinat_images/default.jpg',
                
            ],
            [
                'nama_tempat' => 'Titik B',
                'latitude' => '106.79259299555616',
                'longitude' => '-6.595232678443708',
                'image' => 'koordinat_images/default.jpg',
                
            ],

         
            
        ];

        foreach($dataKoordinat as $key => $val){
            Koordinat::create($val);
        }
    }
}
