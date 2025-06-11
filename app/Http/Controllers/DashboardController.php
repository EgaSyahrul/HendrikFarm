<?php

namespace App\Http\Controllers;

use App\Models\Overview;
use App\Models\SensorLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        // Filter devices based on user role
        if ($user->role === 'admin') {
            $devices = Overview::all(); // Admin can view all devices
        } else {
            $devices = Overview::where('user_id', $user->id)->get(); // Only devices linked to the user
        }

        // Pencarian berdasarkan nama kumbung
        if ($request->has('search') && $request->input('search') !== '') {
            $searchTerm = $request->input('search');
            $userIds = User::where('nama', 'like', '%' . $searchTerm . '%')->pluck('id');
            $devices = $devices->filter(function ($device) use ($searchTerm, $userIds) {
                return stripos($device->nama, $searchTerm) !== false
                    || $userIds->contains($device->user_id);
            });
        }

        $dataDevices = collect();

        foreach ($devices as $device) {
            $api = $device->api;
            $database_kelembaban = $device->humidity;
            $database_status = $device->status;
            $database_lampu = $device->manualLamp;
            $database_temperatur_ruangan = $device->roomTemperature;
            $database_temperatur_mesin = $device->machineTemperature;
            $userName = User::where('id', $device->user_id)->value('nama');

            // API URLs
            $url_suhu = "https://blynk.cloud/external/api/get?token=$api&V$database_temperatur_ruangan";
            $url_kelembaban = "https://blynk.cloud/external/api/get?token=$api&V$database_kelembaban";
            $url_status = "https://blynk.cloud/external/api/get?token=$api&V$database_status";
            $url_manual = "https://blynk.cloud/external/api/get?token=$api&V$database_lampu";
            $url_mesin = "https://blynk.cloud/external/api/get?token=$api&V$database_temperatur_mesin";
            $url_lampu = "https://blynk.cloud/external/api/get?token=$api&V$database_lampu";

            // Fetch data from API
            $suhu = $this->safeApiGet($url_suhu);
            $kelembaban = $this->safeApiGet($url_kelembaban);
            $status = $this->safeApiGet($url_status);
            $mesin = $this->safeApiGet($url_mesin);

            // Check if the device is online
            $online = !empty($status) && !str_contains($status, 'Status Error');

            if ($online) {
                $dataDevices->push([
                    'id' => $device->id,
                    'nama' => $device->nama,
                    'microcontroller' => $device->microcontroller,
                    'status' => $status,
                    'suhu' => $suhu ?? '-',
                    'kelembaban' => $kelembaban ?? '-',
                    'mesin' => $mesin ?? '-',
                    'online' => $online,
                    'user_name' => $userName,
                ]);
            } else {
                $dataDevices->push([
                    'id' => $device->id,
                    'nama' => $device->nama,
                    'microcontroller' => $device->microcontroller,
                    'status' => $status ?? '-',
                    'suhu' => '-',
                    'kelembaban' => '-',
                    'mesin' => '-',
                    'online' => null,
                    'user_name' => $userName,
                ]);
            }
        }

        $dataDevices = $dataDevices->sortByDesc('online')->values();

        // Default data if no devices are available
        if ($dataDevices->isEmpty()) {
            $selectedDevice = null;
            $allCharts = null;
        } else {
            // Get the selected device ID (if any), default to the first device
            $selectedDeviceId = $request->query('device_id', $dataDevices->first()['id']);
            $selectedDevice = $dataDevices->firstWhere('id', $selectedDeviceId);

            // Fetch historical data for charts
            $tanggal = $request->query('tanggal', Carbon::now()->toDateString());
            $logs = SensorLog::where('overview_id', $selectedDeviceId)
                ->whereDate('created_at', $tanggal)
                ->orderBy('created_at')
                ->get();

            $allCharts = [
                'suhu' => $logs->pluck('temperature'),
                'kelembaban' => $logs->pluck('humidity'),
                'waktu' => $logs->pluck('created_at')->map(fn($d) => $d->format('H:i')),
            ];
        }

        $akuns = User::get();

        // dd($devices);
        return view('dashboard.index', compact('dataDevices', 'selectedDevice', 'allCharts', 'user', 'akuns'));
    }

    private function safeApiGet($url)
    {
        try {
            $response = file_get_contents($url);
            return $response;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'api' => 'required|string|max:255',
            'namau' => 'required|exists:account,id',
        ]);

        Overview::create([
            'api' => $request->api,
            'nama' => $request->nama,
            'microcontroller' => 'ESP32',
            'roomTemperature' => '2',
            'humidity' => '3',
            'status' => '0',
            'machineTemperature' => '4',
            'manualLamp' => '1',
            'user_id' => $request->namau,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Perangkat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $device = Overview::findOrFail($id);
        $device->delete();

        return redirect()->route('dashboard.index')->with('success', 'Perangkat berhasil dihapus.');
    }
}
