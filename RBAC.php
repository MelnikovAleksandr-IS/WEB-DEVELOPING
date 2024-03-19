<?php

// Определение ролей
const ROLE_ADMIN = 'admin';
const ROLE_USER = 'user';

// Связь ролей и методов запроса
$rolesMethods = [
    ROLE_ADMIN => [
        'GET',
        'POST',
        'PUT',
        'DELETE',
    ],
    ROLE_USER => [
        'GET',
        'POST',
    ],
];

// Получение текущей роли пользователя из запроса
$currentUserRole = $_GET['role'];

// Получение запрашиваемого метода из запроса
$requestedMethod = $_SERVER['REQUEST_METHOD'];

if (!isset($_GET['role']) || !in_array($_GET['role'], $rolesMethods)) {
    echo "Неверная роль";
    exit;

// Проверка доступа
if (in_array($requestedMethod, $rolesMethods[$currentUserRole])) {
    // Предоставить доступ
    echo "Доступ разрешен";
} else {
    // Запретить доступ
    echo "Доступ запрещен";
}

?>
