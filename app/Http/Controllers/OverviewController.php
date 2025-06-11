<?php

namespace App\Http\Controllers;

use App\Models\Overview;
use App\Models\SensorLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OverviewController extends Controller
{
    function index() {
        $user = User::where('id', Auth::id())->first();
        return view('index', compact('user'));
    }

    public function charts()
    {
        Log::info('Scheduler called OverviewController@charts');

        $devices = Overview::all();

        foreach ($devices as $device) {
            $api = $device->api;
            $url_suhu = "https://blynk.cloud/external/api/get?token=$api&V{$device->roomTemperature}";
            $url_kelembaban = "https://blynk.cloud/external/api/get?token=$api&V{$device->humidity}";

            $suhu = safeApiGet($url_suhu);
            $kelembaban = safeApiGet($url_kelembaban);

            // Simpan ke database (pastikan punya model SensorLog)
            if ($suhu !== null && $kelembaban !== null) {
                SensorLog::create([
                    'overview_id' => $device->id,
                    'temperature' => $suhu,
                    'humidity' => $kelembaban,
                    'created_at' => now(),
                ]);
                Log::info("Data OK device ID");
            } else {
                // return back()->with('error', "Data sensor null untuk device ID {$device->id}");
                Log::warning("Data sensor null untuk device ID {$device->id}");
            }
        }
    }
}
