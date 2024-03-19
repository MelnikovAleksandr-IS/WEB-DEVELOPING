<?php

// Роли и их разрешения
$roles = [
    'admin' => [
        'manage_users' => true,
        'manage_content' => true,
    ],
    'editor' => [
        'manage_content' => true,
    ],
    'user' => [
        // Пользователь по умолчанию имеет только базовые разрешения
    ],
];
