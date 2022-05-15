<?php
    $dbServerName = 'localhost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'school';
    // set DSN (Data Source Name) :string has the associated data structure to describe a connection to the data source.
    $dsn = "mysql:host=$dbServerName;dbname=$dbName";

    // create PDO instance
    $pdo = new PDO($dsn,$dbUserName,$dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $statement = $pdo->prepare("SELECT * FROM person");
    $statement->execute();
    $persons = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    var_dump($persons);
    echo '</pre>';
    foreach($persons as $index => $person){
        echo $person["Pk_Person_Id"].'<br/>';

    }

?>