<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class userMaker extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama' => 'Henduriken',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('iniakunsuper'),
                'alamat' => 'rumah Henduriken',
                'role' => 'admin',
            ],
            [
                'nama' => 'Ega Syahrul',
                'email' => 'egasyahrul2@gmail.com',
                'password' => Hash::make('bukanegga'),
                'alamat' => 'rumahnya egant',
                'role' => 'user',
            ],
            [
                'nama' => 'Admin Lain',
                'email' => 'adminAjah@gmail.com',
                'password' => Hash::make('12345678'),
                'alamat' => 'Rumah Admin Lain',
                'role' => 'admin',
            ],
        ];
        for ($i = 1; $i <= 5; $i++) {
            $userData[] = [
                'nama' => 'Petani Baru ' . $i,
                'email' => 'petani' . $i . '@gmail.com',
                'password' => Hash::make('12345678'),
                'alamat' => 'kebun jamur '. $i,
                'role' => 'user',
            ];
        }
        DB::table('account')->insert($userData);
    }
}
