<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorLog extends Model
{
    use HasFactory;
    protected $table = 'sensor_logs';
    protected $guarded = ['id'];

    protected $fillable = [
        'overview_id',
        'temperature',
        'humidity',
        'created_at',
        'updated_at',
    ];
}
