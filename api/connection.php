<?php
    $host = 'localhost:8889';
    $database = 'api';
    $user = 'root';
    $password = 'root';

    $dsn = "mysql:host=$host; dbname=$database";
    $connection = new PDO($dsn, $user, $password);
    if($connection)
    {
    }
    else
    {
        echo 'Подключение не удалось';
    }
?>