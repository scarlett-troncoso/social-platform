<?php 
require_once __DIR__ . '/Post.php';
require_once __DIR__ . '/Media.php';


/* BONUS: utilizza i dati estratti in precedenza dal DB per istanziare i nuovi oggetti*/

/* Connection db */

$connection = DB::connection_DB();

$sql = "SELECT 
            `posts`.`id` AS `id_post`, 
            `posts`.`title`, 
            `posts`.`date`, 
            `posts`.`tags`, 
            `posts`.`created_at`,
            GROUP_CONCAT(`medias`.`type` ORDER BY `medias`.`id` ASC) AS `types_media`, 
            GROUP_CONCAT(`medias`.`path` ORDER BY `medias`.`id` ASC) AS `paths_media`
        FROM 
            `posts`
        JOIN 
            `media_post` ON `posts`.`id` = `media_post`.`post_id`
        JOIN 
            `medias` ON `media_post`.`media_id` = `medias`.`id`
        GROUP BY 
            `posts`.`id`, `posts`.`title`, `posts`.`date`, `posts`.`tags`, `posts`.`created_at`
        LIMIT 3;";
$result_db = $connection->query($sql);

// var_dump($result_db);

DB::close_connection_DB($connection);

while ($res = $result_db->fetch_assoc()) {
    $media_types = explode(',', $res['types_media']);
    $media_paths = explode(',', $res['paths_media']);
    
    // Crea un nuovo Post e associa i media
    $post = new Post($res['id_post'], $res['id_post'], $res['title'], $res['date'], $res['tags'], $res['created_at'], new Media(/*$type*/$media_types, $media_paths)/*$media_objects*/);

    // Aggiungi il post alla lista dei post
    $posts_db[] = $post;
    //var_dump($post);
}




/*$sql = "SELECT `media_post`.`post_id` AS `id_post`, `medias`.`id` AS `id_media`, `posts`.`title`, `posts`.`date`, `posts`.`tags`, `posts`.`created_at`, `medias`.`type` AS `type_media`, `medias`.`path` AS `path_media`
        FROM `medias`
        JOIN `media_post` ON `media_post`.`media_id` = `medias`.`id`
        JOIN `posts` ON `posts`.`id` = `media_post`.`post_id`;";
$result_db = $connection->query($sql);*/


/* While fino a 6 posts */

/*$posts_db = [];
 
$counter = 0;
$max = 6;

while (($res = $result_db -> fetch_assoc()) and ($counter < $max) ) {
    $counter++;
    array_push($posts_db, new Post($res['id_post'], $res['id_media'], $res['title'], $res['date'], $res['tags'], $res['created_at'], new Media($res['type_media'], $res['path_media'])) );
     
    //Ogni post si ripete la quantitá di volte dei media che ha, visto che ogni post ha piu di un media
} */

?>