<?php 
require_once __DIR__ . '/Post.php';
require_once __DIR__ . '/Media.php';


/* BONUS: utilizza i dati estratti in precedenza dal DB per istanziare i nuovi oggetti*/

/* Connection db */

$connection = DB::connection_DB();

$sql = "SELECT `media_post`.`post_id` AS `id_post`, `medias`.`id` AS `id_media`, `posts`.`title`, `posts`.`date`, `posts`.`tags`, `posts`.`created_at`, `medias`.`type` AS `type_media`, `medias`.`path` AS `path_media`
        FROM `medias`
        JOIN `media_post` ON `media_post`.`media_id` = `medias`.`id`
        JOIN `posts` ON `posts`.`id` = `media_post`.`post_id`;";
$result_db = $connection->query($sql);

DB::close_connection_DB($connection);


/* While fino a 5 posts */

$posts_db = [];
 
$counter = 0;
$max = 5;

while (($res = $result_db -> fetch_assoc()) and ($counter < $max) ) {
    $counter++;
    array_push($posts_db, new Post($res['id_post'], $res['id_media'], $res['title'], $res['date'], $res['tags'], $res['created_at'], new Media($res['type_media'], $res['path_media'])) );
     
    //Ogni post si ripete la quantitá di volte dei media che ha, visto che ogni post ha piu di un media
}
// abbiamo messo id_post al posto di id, e id_media al posto di user_id

// var_dump($posts_db); // 5 risultati






/* COSI SAREBBE STAMPARE IN PAGINA SENZA L'USO DELLA ISTANZA $posts_db
<?php while (($res = $result_db -> fetch_assoc()) and ($i < 5)) :  $i++ ; 
    ['id_post' => $id, 'id_media'=> $user_id, 'title'=> $title, 'date'=> $date, 'tags'=> $tags, 'created_at'=> $created_at, 'type_media'=> $type, 'path_media'=> $path] = $res ?> <!--stampare dal db senza utilizzare le istanze posts_db-->
        <h4><?= $id?></h4>  
        <h4><?= $title ?></h4>  
        <h4><?= $type ?></h4>  
        <h4><?= $path ?></h4>                                            
<?php endwhile; ?>
*/
?>