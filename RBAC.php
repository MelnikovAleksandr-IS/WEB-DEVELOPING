<?php

// Определение ролей
const ROLE_ADMIN = 'admin';
const ROLE_USER = 'user';

// Определение разрешений
const PERMISSION_READ = 'read';
const PERMISSION_WRITE = 'write';

// Связь ролей и разрешений
$rolesPermissions = [
    ROLE_ADMIN => [
        PERMISSION_READ,
        PERMISSION_WRITE,
    ],
    ROLE_USER => [
        PERMISSION_READ,
    ],
];

// Получение текущей роли пользователя из запроса
$currentUserRole = $_GET['role'];

// Получение запрашиваемого разрешения из запроса
$requestedPermission = $_GET['permission'];

// Проверка доступа
if (in_array($requestedPermission, $rolesPermissions[$currentUserRole])) {
    // Предоставить доступ
    echo "Доступ разрешен";
} else {
    // Запретить доступ
    echo "Доступ запрещен";
}

?>
