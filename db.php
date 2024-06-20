<?php
    $dsn = 'mysql:host=localhost:3307;dbname=mydb';
    $username = 'root@';
    $password = '';
    $options = [];
    try {
        $connection = new PDO($dsn, $username, $password, $options);
    }
    catch(PDOException $e) {

    }
    
?>