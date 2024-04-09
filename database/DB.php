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

/*
$sql = "SELECT `posts`.`user_id`, COUNT(`likes`.`user_id`) AS `num_likes`
FROM `posts`
JOIN `likes` ON `likes`.`post_id` = `posts`.`id`
GROUP BY `posts`.`user_id`
ORDER BY `num_likes` DESC;"; // seleziona tutti i post senza like
$result = $connection->query($sql); 
*/



// var_dump($result); 
// var_dump($result->fetch_assoc());

/*
while ($row = $result -> fetch_assoc()) {
    // var_dump($row); 
    // var_dump($row['user_id']);

    ['user_id' => $user_id, 'num_likes' => $num_likes ] = $row; // destructuring

    var_dump($user_id, $num_likes); // cosi mi fa vedere solo i campi ' ' e ' ' della prima riga della tabella departments

    die;
}*/
?>

