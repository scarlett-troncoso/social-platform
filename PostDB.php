<?php 
require_once __DIR__ . '/Models/Post.php';
require_once __DIR__ . '/Models/Media.php';
require_once __DIR__ . '/database/DB.php';

/* BONUS: utilizza i dati estratti in precedenza dal DB per istanziare i nuovi oggetti*/

/* Connection db */
$connection = DB::connection_DB();

$sql = "SELECT `media_post`.`post_id` AS `id_post`, `medias`.`id` AS `id_media`, `posts`.`title`, `posts`.`date`, `posts`.`tags`, `posts`.`created_at`, `medias`.`type` AS `type_media`, `medias`.`path` AS `path_media`
FROM `medias`
JOIN `media_post` ON `media_post`.`media_id` = `medias`.`id`
JOIN `posts` ON `posts`.`id` = `media_post`.`post_id`;"; //quando metto il join de medias non funziona piu il while
$result_db = $connection->query($sql);
DB::close_connection_DB($connection);

/* While fino a 10 posts */

$counter = 0;
$max = 5;
while (($res = $result_db -> fetch_assoc()) and ($counter < $max) ) {
    $counter++;
    $posts_db = [
    new Post($res['id_post'], $res['id_media'], $res['title'], $res['date'], $res['tags'], $res['created_at'], new Media($res['type_media'], $res['path_media'])) 
    ];  
    ////Ci stanno tutti i post ripetute la quantitá di volte dei media che hanno, visto che ogni post ha tanti media
   
    var_dump($posts_db); // 10 risultati
}
// abbiamo messo id_post al posto di id, e id_media al posto di user_id


?>

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
                                
                                <?php foreach($post->medias->path as $mediaPath) : ?>

                                    <?php if ($post->medias->type === 'Photo') : ?>
                                        <img class="px-2" src=<?= $mediaPath ?> alt="<?= $post->medias->getInfoMedia() ?>"></img> 

                                    <?php elseif ($post->medias->type === 'Video') : ?>
                                        <video class="px-2 w-25" src="<?= $mediaPath ?>" alt="<?= $post->medias->getInfoMedia() ?>" ></video> <!--if, se type = photo allora img, se type= video allora video-->                                  
                                    <?php endif;?>

                                <?php endforeach; ?>
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