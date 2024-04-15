<?php 
require __DIR__ . '../database/DB.php';
require_once __DIR__ . '/Post.php';
require_once __DIR__ . '/Media.php';


/* BONUS: utilizza i dati estratti in precedenza dal DB per istanziare i nuovi oggetti*/

/* Connection db */

$connection = DB::connection_DB();

$sql = "SELECT `media_post`.`post_id` AS `id_post`, `medias`.`id` AS `id_media`, `posts`.`title`, `posts`.`date`, `posts`.`tags`, `posts`.`created_at`, `medias`.`type` AS `type_media`, `medias`.`path` AS `path_media`
        FROM `medias`
        JOIN `media_post` ON `media_post`.`media_id` = `medias`.`id`
        JOIN `posts` ON `posts`.`id` = `media_post`.`post_id`;"; //quando metto il join de medias non funziona piu il while
$result_db = $connection->query($sql);

DB::close_connection_DB($connection);

/* While fino a 5 posts */

/*$counter = 0;
$max = 5;
while (($res = $result_db -> fetch_assoc()) and ($counter < $max) ) {
    $counter++;
    $posts_db = [
    new Post($res['id_post'], $res['id_media'], $res['title'], $res['date'], $res['tags'], $res['created_at'], new Media($res['type_media'], $res['path_media'])) 
    ];  
    ////Tutti i post ripetute la quantitá di volte dei media che hanno, visto che ogni post ha piu di un media
   
    var_dump($posts_db); // 5 risultati
}*/
// abbiamo messo id_post al posto di id, e id_media al posto di user_id

/*
$postFuori = [
    new Post($res['id_post'], $res['id_media'], $res['title'], $res['date'], $res['tags'], $res['created_at'], new Media($res['type_media'], $res['path_media'])) 
];*/
/*
function FunctionName($result_db){
    $counter = 0;
        $max = 5;
            while (($res = $result_db -> fetch_assoc()) and ($counter < $max) ) {
            $counter++;
              
            ////Ci stanno tutti i post ripetute la quantitá di volte dei media che hanno, visto che ogni post ha piu di un media
    
            // var_dump($posts_db); // 5 risultati
            $posts_db = [
                new Post($res['id_post'], $res['id_media'], $res['title'], $res['date'], $res['tags'], $res['created_at'], new Media($res['type_media'], $res['path_media'])) 
                ];
            }

            //var_dump($posts_db);
            return $posts_db;
};*/
//$result->num_rows === 0
//$posts_five = FunctionName($result_db);
//var_dump($result_db);
// var_dump($posts_five);
// var_dump($postFuori);
//$posts_five_db = FunctionName($posts_db);
// var_dump($res);
//var_dump($posts_five_db);
        

  //  ['id_post' => $id_post, 'id_media'=> 'title'=> 'date'=>'tags'=>'created_at'=> new Media($res['type_media'], $res['path_media'] = $res 


// abbiamo messo id_post al posto di id, e id_media al posto di user_id


?>