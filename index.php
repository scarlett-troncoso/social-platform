<?php 
require_once __DIR__ . '/Models/Post.php';
require_once __DIR__ . '/Models/Media.php';
require __DIR__ . '/database/DB.php';
require_once __DIR__ . '/Models/Inheritance.php';

/* Step 3: Crea una pagina che in php si connetta al db con mysqli e stampi i dati in pagina di una query a scelta tra le precedenti.  */
$connection = DB::connection_DB();

$sql = "SELECT `posts`.`user_id`, COUNT(`likes`.`user_id`) AS `num_likes`
        FROM `posts`
        JOIN `likes` ON `likes`.`post_id` = `posts`.`id`
        GROUP BY `posts`.`user_id`
        ORDER BY `num_likes` DESC;"; // # 4. Ordina gli utenti per il numero di media caricati
$result = $connection->query($sql); 

DB::close_connection_DB($connection);

/* Step 4: In un nuovo file, vengono istanziati almeno due oggetti Post e stampati a schermo i valori delle relative proprietà. */
$posts = [
    new Post(1, 20, 'Giorno di Mare', '2024-04-09', ['Vacanze', 'Amici', 'Famiglia'], '2024-04-06', new Media('Photo', 'https://picsum.photos/id/16/200/200')),
    new Post(2, 35, 'Nuovo lavoro', '2024-04-03', ['Lavoro', 'Smartworking'], '2024-04-01', new Media('Photo', 'https://picsum.photos/id/9/200/200')),
    new Post(3, 48, 'Video progetto', '2024-04-08', ['Videomaker', 'Publicita'], '2024-04-04', new Media('Video', 'https://videos.pexels.com/video-files/8376511/8376511-uhd_2160_2160_25fps.mp4')),
    new PostExtend(4, 50, 'Trekking in montagna', '2024-04-08', ['Trekking', 'Sport', 'Natura'], '2024-04-04', new Media('Photo', 'https://picsum.photos/id/910/200/200')), // istanziata con class PostExtend del file Inheritance.php folder: Models
];

// istanziata con class MediaExtend del file Inheritance.php folder: Models
$media_extends = [
    new MediaExtend(5, 81, 'Passeggiata in cittá', '2024-04-08', ['Turismo', 'Viaggio'], '2024-04-04', 'Photo', 'https://picsum.photos/id/629/200/200')
];




include __DIR__ . '/Models/PostDB.php'; 
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
        <main style="background-color: darkslategrey">
                      
            <?php include __DIR__ . '/Partials/stampPost.php'; ?>
          
            <?php include __DIR__ . '/Partials/stampQuery.php'; ?>
            
        </main>
    </body>
</html>