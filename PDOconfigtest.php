<?php
    $dbServerName = 'localhost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'school';
    // set DSN (Data Source Name) :string has the associated data structure to describe a connection to the data source.
    $dsn = "mysql:host=$dbServerName;dbname=$dbName";

    // create PDO instance
    $pdo = new PDO($dsn,$dbUserName,$dbPassword);

    // PDO query
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // set a default mode(EX: PDO::FETCH_ASSOC) for the fetch statement . mode: The mode parameter determines how PDO returns the row(EX: ASSOCIATIVE ARRAY).
    $sql = "SELECT * FROM person";
    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch()) {
        echo '<pre>';
        var_dump($row);
        echo '</pre>';
        echo $row['Name'];
        
    }

    // Prepare statement (prepare & execute).
    
    //Unsafe because of SQL injection.
    $fname = 'yousef';
    $sqlUnsafe = "SELECT * FROM person WHERE Name = '$fname'";

    // Safe way to execute.
    // Positional parameters ((?) : parameter markers).
    // Prameter markers is just placeholder (كومبارس / تعبايت مكان).
    $sqlPositional = "SELECT * FROM person WHERE Name = ?";
    $stmt = $pdo->prepare($sqlPositional); // Prepares a statement for execution and returns a statement object | false.
    $stmt->execute([$fname]); // Executes the  prepared statement and returns true on success or false on failure.
    $persons = $stmt->fetchAll(); // fetches all rows that applied the conditions.
        echo '<pre>';
        var_dump($persons);
        echo '</pre>';

        // $personsCount = count($persons);
        $personsCount = $stmt->rowCount();
        echo $personsCount;


    // Named parameters (:name).
    $email = 'm@gmail.com';
    $sqlNamed = "SELECT * FROM person WHERE EmailId = :email";
    $stmt = $pdo->prepare($sqlNamed); // Prepares a statement for execution and returns a statement object | false.
    $stmt->execute([':email'=> $email]); // we put associative array 
    $person = $stmt->fetch(); // fetches one row that applied the conditions.
    echo '<pre>';
        var_dump($person);
        echo '</pre>';


    
    
    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // $statement = $pdo->prepare("SELECT * FROM person");
    // $statement->execute();
    // $persons = $statement->fetchAll(PDO::FETCH_ASSOC);

    // echo '<pre>';
    // var_dump($persons);
    // echo '</pre>';
    // foreach($persons as $index => $person){
    //     echo $person["Pk_Person_Id"].'<br/>';

    // }

?>