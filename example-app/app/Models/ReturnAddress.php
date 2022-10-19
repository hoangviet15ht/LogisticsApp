<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnAddress extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'return_addresses';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
