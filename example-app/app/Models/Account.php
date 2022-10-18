<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\Role;
use App\Enums\Status;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'role' => Role::class,
        'status' => Status::class,
    ];

    const ROLE_CUSTOMER = 1;
    const ROLE_TRANSPORTER = 2;
    const ROLE_MANAGER = 3;
    const ROLE_ADMIN = 101;

    const STATUS_ON = 1;
    const STATUS_OFF = 2;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
