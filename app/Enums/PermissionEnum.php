<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case CREATE_EVENT = 'can create app/Models/Party';

    public function getMiddleware(): string
    {
        return 'permission:' . $this->value;
    }
}
