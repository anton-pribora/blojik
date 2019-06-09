<?php 

spl_autoload_register(function($class) {
    // Подгрузка класса
    $file = __DIR__ . '/' . strtr($class, '\\', '/') . '.php';
    
    if (file_exists($file)) {
        include $file;
    }
});