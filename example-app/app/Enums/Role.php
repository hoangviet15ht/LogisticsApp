<?php

namespace App\Enums;

enum Role: int
{
    case customer = 1;
    case transporter = 2;
    case manager = 3;
    case Admin = 101;
};
