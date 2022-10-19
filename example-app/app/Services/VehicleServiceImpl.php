<?php

namespace App\Services;

use App\Services\Interfaces\VehicleService;
use App\Models\Vehicle;

class VehicleServiceImpl extends BaseServiceImpl implements VehicleService
{
    public function createVehicle(array $data) {
        // todo:
    }

    public function updateVehicle(Vehicle $vehicle, array $data) : bool {
        return $vehicle->update($data);
    }
}
