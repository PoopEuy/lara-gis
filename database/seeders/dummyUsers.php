<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dummyUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $userData = [
            [
                'name' => 'Account Viewers',
                'email' => 'viewers@gmail.com',
                'role' => 'viewers',
                'password'=>bcrypt('12345')
            ],

            [
                'name' => 'Account Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password'=>bcrypt('12345')
            ],
            
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
