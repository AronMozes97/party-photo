<?php
// config/admin_menu.php

use App\Enums\PermissionEnum;
use App\Models\Event;

return [
    'categories' => [
        'events' => [
            'label' => 'Events',
            'items' => [
                [
                    'label'   => 'Create new event',
                    'route'   => 'admin.event.create',
                    'ability' => PermissionEnum::CREATE_EVENT->value,
                    'icon'    => 'plus',
                ],
                [
                    'label'   => 'List events',
                    'route'   => 'admin.event.index',
                    'ability' => PermissionEnum::VIEW_EVENT->value,
                    'icon'    => 'list',
                ],
            ],
        ],
        'users'  => [
            'label' => 'Users',
            'items' => [
                [
                    'label'   => 'All users',
                    'route'   => 'admin.event.index',
                    'ability' => PermissionEnum::DELETE_EVENT->value,
                    'icon'    => 'users',
                ],
            ],
        ],
    ],
];
