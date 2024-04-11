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
/*
/* In un nuovo file, vengono istanziati almeno due oggetti Post e stampati a schermo i valori delle relative proprietà. */
$posts = [
    new Post(1, 20, 'Giorno di Mare', '09-04-2024', ['Vacanze', 'Amici', 'Famiglia'], '06-04-2024', new Media('Photo', 'https://picsum.photos/id/16/200/200')),
    new Post(2, 35, 'Nuovo lavoro', '03-04-2024', ['Lavoro', 'Smartworking'], '01-04-2024', new Media('Photo', 'https://picsum.photos/id/9/200/200')),
    new Post(3, 48, 'Oggi preparo la pasta', '08-04-2024', ['Cuina', 'Cucina Italiana'], '04-04-2024', new Media('Video', 'https://cdn.pixabay.com/video/2024/02/11/200157-912127896_large.mp4'))
];

/* BONUS: utilizza i dati estratti in precedenza dal DB per istanziare i nuovi oggetti*/

$connection = DB::connection_DB();

$sql = "SELECT * FROM `posts`
        /*JOIN `medias` ON `medias`.`user_id` = `posts`.`user_id`*/;"; //quando metto il join de medias non funziona piu il while
$result_db = $connection->query($sql);
DB::close_connection_DB($connection);

/* While fino a 10 posts */
$counter = 0;
$max = 5;
while (($res = $result_db -> fetch_assoc()) and ($counter < $max) ) {
    $counter++;
    $posts_db = [
    new Post($res['id'], $res['user_id'], $res['title'], $res['date'], $res['tags'], $res['created_at'], new Media('Photo', 'https://picsum.photos/id/16/200/200')/*$res['type'], $res['path']*/) //quando metto il join de medias non funziona piu il while
        ];  
    // var_dump($res);
    var_dump($posts_db); // 10 risultati
    
} 

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
                <?php foreach($posts as $post) : ?>
                    <div class="">
                        <div class="card p-2 m-3 w-auto">                    
                            <h4><?= $post->title ?></h4>
                            <span><?= $post->date ?></span>
                            <span><?= $post->medias->type ?></span>

                            <div class="d-flex">
                                    <?php if ($post->medias->type === 'Photo') : ?>
                                        <img class="px-2" src=<?= $post->medias->path ?> alt="<?= $post->medias->getInfoMedia() ?>"></img> 

                                        <?php elseif ($post->medias->type === 'Video') : ?>
                                            <video class="px-2 w-25" src="<?= $post->medias->path ?>" alt="<?= $post->medias->getInfoMedia() ?>" ></video> <!--if, se type = photo allora img, se type= video allora video-->                                  
                                    <?php endif;?>
                            </div>
                            
                            <div>TAGS: 
                                <?php foreach($post->getTags() as $tag) : ?>
                                    <span> <?= '  ' . $tag . ' | '?> </span>
                                <?php endforeach; ?>
                            </div>
                            
                        </div>
                    </div> 
                <?php endforeach; ?>               
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
                        <?php while ($row = $result->fetch_assoc() ) :
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