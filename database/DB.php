<?php 
/* Database connection */

// Define some constants
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'db-social-platform');

class DB {

    public static function connection_DB()
    {
        // create an instance of the new connection
        $connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // check if there is a connection error
        if ($connection && $connection->connect_error) {
            echo 'Database Connection Failed' . $connection->connect_error; 
        die;
        }

        return $connection;
    }

    public static function close_connection_DB($connection){
        $connection->close();
    }

    // var_dump($connection);
}

// var_dump($connection);
// var_dump($DB);
// var_dump($result); 
// var_dump($result->fetch_assoc());

?>

