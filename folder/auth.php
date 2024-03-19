<?php

session_start();

// Проверка, авторизован ли пользователь
function is_logged_in()
{
    return isset($_SESSION['user']);
}

// Аутентификация пользователя (простой пример, можно расширить)
function login($username, $password)
{
    // Здесь можно добавить логику проверки ваших пользователей и паролей
    // Например, сравнивать с данными из базы данных
    if ($username === 'user' && $password === 'password') {
        $_SESSION['user'] = $username;
        return true;
    }
    return false;
}

// Разлогинивание пользователя
function logout()
{
    unset($_SESSION['user']);
}

// Проверка разрешения
function has_permission($permission)
{
    global $roles;
    if (!is_logged_in()) {
        return false;
    }
    $role = $_SESSION['user_role'];
    return isset($roles[$role][$permission]) && $roles[$role][$permission] === true;
}
