<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;

class AccountVehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'account_vehicle';

    protected $casts = [
        'status' => Status::class,
    ];

    const STATUS_ON = 1;
    const STATUS_OFF = 2;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
