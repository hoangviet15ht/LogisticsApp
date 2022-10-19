<?php

namespace App\Services;

use App\Services\Interfaces\AccountVehicleService;
use App\Models\AccountVehicle;

class AccountVehicleServiceImpl extends BaseServiceImpl implements AccountVehicleService
{
    public function createAccountVehicle(array $data) {
        // todo:
    }

    public function updateAccountVehicle(AccountVehicle $account_vehicle, array $data) : bool {
        return $account_vehicle->update($data);
    }
}
