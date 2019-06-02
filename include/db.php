<?php

// Подключение к базе данных

/* Подключение к базе данных MySQL с помощью вызова драйвера */
$dsn = 'mysql:dbname=test;host=127.0.0.1';
$user = 'test';
$password = '123';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

function my_query($sql, $params = [])
{
    global $dbh;
    
    if ($params) {
        $sth = $dbh->prepare($sql);
        $sth->execute($params);
        
        return $sth;
    } else {
        return $dbh->query($sql);
    }
}


function my_last_insert_id()
{
    global $dbh;
    
    return $dbh->lastInsertId();
}