<?php

namespace App\Services;

use App\Services\Interfaces\UserService;
use App\Models\User;

class UserServiceImpl extends BaseServiceImpl implements UserService
{
    public function createCustomerUser(array $data) {
        // todo:
    }

    public function createTransporterUser(array $data) {
        //todo:
    }

    public function createManagerUser(array $data) {
        // todo:
    }

    public function createAdminUser(array $data) {
        // todo:
    }

    public function updateUser(User $user, array $data) : bool {
        return $user->update($data);
    }
}
