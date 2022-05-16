<?php
    $serverName = "localhost";
    $userName = "root";
    $pwd = "";
    $dbName = "market";

    $dsn = "mysql:host=$serverName;dbname=$dbName";
    try {
        $pdo = new PDO($dsn,$userName,$pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>