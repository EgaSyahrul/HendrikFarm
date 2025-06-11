<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyMaker extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $DefaultData =[
            [
                'user_id'=>'2',
                'api'=>'kcu3V8PYqnJpDKv6r4Asr848K8PsjcGK',
                'nama'=>'Kumbung 1',
                'microcontroller'=>'ESP32',
                'roomTemperature'=>'2',
                'humidity'=>'3',
                'status'=>'0',
                'machineTemperature'=>'4',
                'manualLamp'=>'1',
            ],
            [
                'user_id'=>'2',
                'api'=>'CIR2f0Sd22azN9pJYbP_B_p6hRAymKqx',
                'nama'=>'Outdoor',
                'microcontroller'=>'ESP32',
                'roomTemperature'=>'2',
                'humidity'=>'3',
                'status'=>'0',
                'machineTemperature'=>'4',
                'manualLamp'=>'1',
            ],
            [
                'user_id'=>'4',
                'api'=>'CIR2f0Sd22azN9pJYbP_B_p6hRAymKq',
                'nama'=>'Kumbung Rusak',
                'microcontroller'=>'ESP32',
                'roomTemperature'=>'2',
                'humidity'=>'3',
                'status'=>'0',
                'machineTemperature'=>'4',
                'manualLamp'=>'1',
            ],
            [
                'user_id'=>'5',
                'api'=>'CIR2f0Sd22azN9pJYbP_B_p6hRAymKx',
                'nama'=>'Kumbung Error',
                'microcontroller'=>'ESP32',
                'roomTemperature'=>'2',
                'humidity'=>'3',
                'status'=>'0',
                'machineTemperature'=>'4',
                'manualLamp'=>'1',
            ],
            [
                'user_id'=>'5',
                'api'=>'CIR2f0Sd22azN9pJYbPp6hRAymKqx',
                'nama'=>'Kumbung Rusak',
                'microcontroller'=>'ESP32',
                'roomTemperature'=>'2',
                'humidity'=>'3',
                'status'=>'0',
                'machineTemperature'=>'4',
                'manualLamp'=>'1',
            ],
            [
                'user_id'=>'6',
                'api'=>'CIR2f0Sd22azN9pJYbP_B_p6Kqx',
                'nama'=>'Kumbung Kurang',
                'microcontroller'=>'ESP32',
                'roomTemperature'=>'2',
                'humidity'=>'3',
                'status'=>'0',
                'machineTemperature'=>'4',
                'manualLamp'=>'1',
            ],
        ];
        DB::table('overview')->insert($DefaultData);
    }
}
