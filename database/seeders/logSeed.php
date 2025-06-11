<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class logSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData =[
            [
                'overview_id'=>'2',
                'temperature'=>'50',
                'humidity'=>'100',
                'created_at'=> '2025-05-10 16:29:48',
                'updated_at'=> '2025-05-10 16:29:48'
            ],
            [
                'overview_id'=>'2',
                'temperature'=>'50',
                'humidity'=>'100',
                'created_at'=> '2025-05-11 16:29:48',
                'updated_at'=> '2025-05-11 16:29:48'
            ],
            [
                'overview_id'=>'2',
                'temperature'=>'50',
                'humidity'=>'100',
                'created_at'=> '2025-05-12 16:29:48',
                'updated_at'=> '2025-05-12 16:29:48'
            ],
            [
                'overview_id'=>'2',
                'temperature'=>'50',
                'humidity'=>'100',
                'created_at'=> '2025-05-13 16:29:48',
                'updated_at'=> '2025-05-13 16:29:48'
            ],
            [
                'overview_id'=>'2',
                'temperature'=>'50',
                'humidity'=>'100',
                'created_at'=> '2025-05-15 14:29:48',
                'updated_at'=> '2025-05-15 14:29:48'
            ],
            [
                'overview_id'=>'2',
                'temperature'=>'50',
                'humidity'=>'100',
                'created_at'=> '2025-05-15 16:29:48',
                'updated_at'=> '2025-05-15 16:29:48'
            ],
        ];
        DB::table('sensor_logs')->insert($userData);
    }
}
