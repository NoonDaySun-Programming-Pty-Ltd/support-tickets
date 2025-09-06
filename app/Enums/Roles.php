<?php

declare(strict_types=1);

namespace App\Enums;

enum Roles: string
{
    case Manager = 'manager';
    case Staff = 'staff';
    case Client = 'client';
}
