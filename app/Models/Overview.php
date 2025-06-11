<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;
    protected $table = 'overview';
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'api',
        'nama',
        'microcontroller',
        'roomTemperature',
        'humidity',
        'status',
        'machineTemperature',
        'manualLamp',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
