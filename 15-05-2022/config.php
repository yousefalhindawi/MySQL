<?php
    $dbServerName = 'localhost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'school';

    /* mysqli_connect("hostname", "username", "password", "database"):
    Open a new connection to the MySQL server returns an 'object' if the connection successfull;
    and if the connection fails returns 'false'  */

    $conn = @mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName); 
    


    // mysqli_connect_error()) Returns a description of the last connection error.
    // die() Output a message and terminate the current script.

    // if (!$conn) {
    //     die( '<p style="color:white;background-color:red;padding:20px; margin:20px auto;width:300px">'."Could not connect to database because : " . mysqli_connect_error()).'</p>'; 
    // }else {
    //     echo "Database connected successfully";
    // }

    // $sql = "SELECT * FROM person";
    // $result = mysqli_query($conn, $sql);
    // $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // echo '<pre>';
    // var_dump($rows);
    // echo '</pre>';
    // echo $rows[0]["Pk_Person_Id"];
?>