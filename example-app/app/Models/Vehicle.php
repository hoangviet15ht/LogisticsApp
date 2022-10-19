<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'vehicles';

    protected $casts = [
        'status' => Status::class,
    ];

    const STATUS_ON = 1;
    const STATUS_OFF = 2;
}
