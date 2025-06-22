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
    function index()
    {
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
            $url_status = "https://blynk.cloud/external/api/get?token=$api&V{$device->status}";

            $suhu = safeApiGet($url_suhu);
            $kelembaban = safeApiGet($url_kelembaban);
            $status = safeApiGet($url_status);

            $online = !empty($status) && !str_contains($status, 'Sensor Error');

            // Simpan ke database (pastikan punya model SensorLog)
            if ($online) {
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

    public function sync()
    {
        $devices = Overview::all();

        foreach ($devices as $device) {
            $api = $device->api;

            $urls = [
                'suhu' => "https://blynk.cloud/external/api/get?token=$api&V2",
                'kelembaban' => "https://blynk.cloud/external/api/get?token=$api&V3",
                'status' => "https://blynk.cloud/external/api/get?token=$api&V0",
                'mesin' => "https://blynk.cloud/external/api/get?token=$api&V4",
            ];

            $data = [];
            foreach ($urls as $key => $url) {
                $data[$key] = $this->fetchApiData($url);
            }

            $online = !empty($status) && !str_contains($status, 'Sensor Error');

            // Simpan ke database (pastikan punya model SensorLog)
            if ($online) {
                $device->update([
                    'roomTemperature' => $data['suhu'] ?? null,
                    'humidity' => $data['kelembaban'] ?? null,
                    'status' => $data['status'] ?? null,
                    'machineTemperature' => $data['mesin'] ?? null,
                ]);

                Log::info("Data for device {$device->id} updated.");
            } else {
                Log::warning("Data sensor null untuk device ID {$device->id}");
            }
        }

        $this->info('Sensor data synced successfully.');
    }
}
