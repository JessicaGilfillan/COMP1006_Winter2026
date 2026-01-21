<?php 
//Database connection settings
$host = "localhost"; 
$db = "week_three";
$user = "root";
$password = "";

//DSN - Data Source Name 
$dsn = "mysql:host=$host;dbname=$db";

try {
    //Create PDO object
    //attempting to connect to the database  
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //if the connection is successful, then say yay! 
    echo "<p> YAY Connected </p>";
}
catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage()); 
}

/*PDO tries to connect, if it fails, PHP creates an PDOException object and that object contains an error message */
