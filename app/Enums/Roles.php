<?php

namespace App\Enums;

enum Roles: string
{
    case None = 'None';
    case User = 'user';
    case Admin = 'admin';
    case Customer = 'customer';
}
