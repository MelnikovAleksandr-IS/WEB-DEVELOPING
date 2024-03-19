<?php

// Получаем HTTP метод запроса
$method = $_SERVER['REQUEST_METHOD'];

// Получаем запрашиваемый URL
$request = $_SERVER['REQUEST_URI'];

// Парсим URL
$url = explode('/', trim($request, '/'));

// Определяем ресурс и идентификатор (если есть)
$resource = array_shift($url);
$resourceId = array_shift($url);

// Проверяем метод запроса и выполняем соответствующие действия
switch ($method) {
    case 'GET':
        // Обработка GET запроса
        handleGetRequest($resource, $resourceId);
        break;
    case 'POST':
        // Обработка POST запроса
        handlePostRequest($resource, $resourceId);
        break;
    case 'PUT':
        // Обработка PUT запроса
        handlePutRequest($resource, $resourceId);
        break;
    case 'DELETE':
        // Обработка DELETE запроса
        handleDeleteRequest($resource, $resourceId);
        break;
    default:
        // Возвращаем ошибку, если метод не поддерживается
        http_response_code(405);
        echo json_encode(array('error' => 'Method Not Allowed'));
        break;
}

// Функция обработки GET запроса
function handleGetRequest($resource, $resourceId) {
    // Здесь можно реализовать логику получения данных по GET запросу
    echo json_encode(array('method' => 'GET', 'resource' => $resource, 'id' => $resourceId));
}

// Функция обработки POST запроса
function handlePostRequest($resource, $resourceId) {
    // Здесь можно реализовать логику создания новых данных по POST запросу
    echo json_encode(array('method' => 'POST', 'resource' => $resource, 'id' => $resourceId));
}

// Функция обработки PUT запроса
function handlePutRequest($resource, $resourceId) {
    // Здесь можно реализовать логику обновления данных по PUT запросу
    echo json_encode(array('method' => 'PUT', 'resource' => $resource, 'id' => $resourceId));
}

// Функция обработки DELETE запроса
function handleDeleteRequest($resource, $resourceId) {
    // Здесь можно реализовать логику удаления данных по DELETE запросу
    echo json_encode(array('method' => 'DELETE', 'resource' => $resource, 'id' => $resourceId));
}
