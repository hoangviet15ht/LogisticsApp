<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\OrderStatus;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'orders';

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function vehicle()
    {
        $this->belongsTo(Vehicle::class);
    }

    public function account()
    {
        $this->belongsTo(Account::class);
    }

    public function return_addresses(): HasMany
    {
        $this->hasMany(ReturnAddress::class);
    }
}
