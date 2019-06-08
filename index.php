<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', true);

// Подключаем базу данных
include 'include/functions.php';
include 'include/db.php';

// Заголовок страницы
include 'template/header.php';
include 'template/menu.php';

$action = 'post_list';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$actionFile = "actions/$action.php";

if (file_exists($actionFile)) {
    $actionDir = dirname($actionFile);
    $authFile = "$actionDir/auth.php";
    
    // Подключаем проверку авторизации
    if (file_exists($authFile)) {
        include $authFile;
    }
    
    // Выполнение действия
    include_once $actionFile;
} else {
    echo "Файл $actionFile не найден!";
}

// Подавал страницы
include 'template/footer.php';