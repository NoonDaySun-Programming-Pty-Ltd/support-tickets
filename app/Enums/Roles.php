<?php

namespace App\Enums;

enum Roles: string
{
    case Manager = 'manager';
    case Staff = 'staff';
    case Client = 'client';
}
