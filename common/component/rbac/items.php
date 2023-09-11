<?php

return [
    'xodim' => [
        'type' => 1,
        'description' => 'Xodim',
    ],
    'supervisor' => [
        'type' => 1,
        'description' => 'Nazoratchi',
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Admin',
        'children' => [
            'supervisor',
            'supervisor',
        ],
    ],
];
