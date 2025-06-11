<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\OverviewController;

class SyncSensorData extends Command
{
    protected $signature = 'sync:sensor-data';
    protected $description = 'Sync sensor data from Blynk API';

    public function handle()
    {
        app(OverviewController::class)->charts();
        $this->info('Sensor data synced.');
    }
}
