<?php

namespace App\Services\Interfaces;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Throwable;

interface VehicleService
{
    public function createVehicle(array $data);
    public function updateVehicle(Vehicle $vehicle,array $data) : bool;
}
