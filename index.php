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

$sql = "SELECT `posts`.`user_id`, COUNT(`likes`.`user_id`) AS `num_likes`
FROM `posts`
JOIN `likes` ON `likes`.`post_id` = `posts`.`id`
GROUP BY `posts`.`user_id`
ORDER BY `num_likes` DESC;"; // seleziona tutti i post senza like
$result = $connection->query($sql); 

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Platform</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"/>
</head>
<body>
    <main>
        <div class="container py-4">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">Likes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) :
                    ['user_id' => $user_id, 'num_likes' => $num_likes ] = $row; ?> 
                        <tr>
                            <th scope="row"><?= $user_id ?></th>
                            <td><?= $num_likes ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>           
        </div>
    </main>
</body>
</html>