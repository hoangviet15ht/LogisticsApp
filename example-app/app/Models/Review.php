<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'reviews';

    public function account() {
        return $this->belongsToMany(Account::class, 'customer_id', 'transporter_id');
    }

}
