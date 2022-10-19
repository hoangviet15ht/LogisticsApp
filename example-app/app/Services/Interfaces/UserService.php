<?php

namespace App\Services\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

interface UserService
{
    public function createCustomerUser(array $data);
    public function createTransporterUser(array $data);
    public function createManagerUser(array $data);
    public function createAdminUser(array $data);
    public function updateUser(User $user, array $data) :bool;
}
