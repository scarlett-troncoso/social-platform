<?php 
/* Database connection */

// Define some constants
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'db-social-platform');

// create an instance of the new connection
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// check if there is a connection error
if ($connection && $connection->connect_error) {
    echo 'Database Connection Failed' . $connection->connect_error; 
    die;
}

var_dump($connection);

$sql = "SELECT * FROM `users`"; // seleziona tutti i post senza like
$result = $connection->query($sql); 

var_dump($result); 

var_dump($result->fetch_all()); 

?>