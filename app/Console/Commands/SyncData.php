<?php

namespace App\Console\Commands;

use App\Http\Controllers\OverviewController;
use Illuminate\Console\Command;

class SyncData extends Command
{
    protected $signature = 'sync:data';
    protected $description = 'Sync sensor data from Blynk API';

    public function handle()
    {
        app(OverviewController::class)->sync();
        $this->info('Sensor data synced.');
    }
}
