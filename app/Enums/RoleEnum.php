<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    public function getMiddleware(): string
    {
        return 'role:' . $this->value;
    }
}
