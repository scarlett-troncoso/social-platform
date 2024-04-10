<?php 
require_once __DIR__ . '/Models/Post.php';
require_once __DIR__ . '/Models/Media.php';
require_once __DIR__ . '/database/DB.php';


$connection = DB::connection_DB();

$sql = "SELECT * FROM `users`
        JOIN `posts` ON `posts`.`user_id` = `users`.`id`
        JOIN `medias` ON `medias`.`user_id` = `users`.`id`;"; 
$result = $connection->query($sql);
DB::close_connection_DB($connection);

$res = $result -> fetch_assoc();
$posts = [
    new Post($res['id'], $res['user_id'], $res['title'], $res['date'], $res['tags'], $res['created_at'], new Media($res['type'], $res['path'])),
];

var_dump($posts);

/*
while ($res = $result -> fetch_assoc()) {
   // var_dump($res); 
    
    // ['id' => $id, 'user_id' => $user_id, 'title' => $title, 'date' => $date, 'tags' => $tags, 'created_at' => $created_at] = $res; // destructuring

    die;
}*/


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