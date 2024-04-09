<?php 
require_once __DIR__ . '/Models/Post.php';
require_once __DIR__ . '/Models/Media.php';
require_once __DIR__ . '/database/DB.php';


$connection = DB::connection_DB();

$sql = "SELECT `posts`.`user_id`, COUNT(`likes`.`user_id`) AS `num_likes`
FROM `posts`
JOIN `likes` ON `likes`.`post_id` = `posts`.`id`
GROUP BY `posts`.`user_id`
ORDER BY `num_likes` DESC;"; // # 4. Ordina gli utenti per il numero di media caricati
$result = $connection->query($sql); 

DB::close_connection_DB($connection);


/* In un nuovo file, vengono istanziati almeno due oggetti Post e stampati a schermo i valori delle relative proprietà. */
$posts = [
    new Post(1, 20, 'Giorno di Mare', '09-04-2024', ['Vacanze', 'Amici', 'Famiglia'], '06-04-2024', new Media('https://picsum.photos/id/16/200/200')),
    new Post(2, 35, 'Nuovo lavoro', '03-04-2024', ['Lavoro', 'Smartworking'], '01-04-2024', new Media('https://picsum.photos/id/9/200/200'))
];

// var_dump($posts);
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
            <div class="container py-4 w-75">  
            <h2 class="w-75">Stampa 2 istanze Post</h2>
                <div class="d-flex">
                    <?php foreach($posts as $post) : ?>
                        <div class="col-5">
                            <div class="card p-2 m-3">                    
                                <h4><?= $post->title ?></h4>
                                <span><?= $post->date ?></span>
                                <?php foreach($post->medias as $mediaPath) : ?>
                                    <img class="w-100" src=<?= $mediaPath ?> ></img> 
                                <?php endforeach; ?>
                                
                                <div>TAGS: 
                                    <?php foreach($post->tags as $tag) : ?>           
                                        <span><?= '  ' . $tag . ' | '?></span>    
                                    <?php endforeach; ?>   
                                </div>
                            </div>
                        </div> 
                    <?php endforeach; ?>        
                </div>            
            </div>

            
            <div class="container py-4 w-75">
            <h2>Stampa 1 query del Database:</h2>
            <span># 4. Ordina gli utenti per il numero di media caricati</span>
                <table class="table w-25">
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