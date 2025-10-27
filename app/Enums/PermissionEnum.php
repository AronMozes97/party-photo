<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case CREATE_EVENT = 'can create app/Models/Event';
    case LIST_EVENTS  = 'can list app/Models/Event';
    case VIEW_EVENT   = 'can show app/Models/Event';
    case UPDATE_EVENT = 'can update app/Models/Event';
    case DELETE_EVENT = 'can delete app/Models/Event';

    public function getMiddleware(): string
    {
        return 'permission:' . $this->value;
    }
}
