<?php 
/*
all'interno della classe sono dichiarate delle variabili d'istanza
● all'interno della classe è definito un costruttore
● all'interno della classe è definito almeno un metodo
● tra i parametri del costruttore accetta un Media
● BONUS: il costruttore accetta più Media
*/
/**
 * ### Class Post
 * describes the information of the posts
 */
class Post {


    public static string $updated_at = 'NULL';

    /**
         * 
        * @param Int $id -- post id
        * @param Int $user_id -- user id
        * @param String $title -- post title
        * @param String $date -- post date
        * @param Array $tags -- post tags
        * @param String $created_at -- post creation date
        * @param Media $medias -- type and path of medias, of Class Media 
        */
    public function __construct(public int $id, public int $user_id, public string $title, public string $date, public $tags, public string $created_at, public Media $medias) // $tags non dichiarato array perche con i dati del DB non riconosce come array ma come stringa
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->date = $date;
        $this->tags = $tags;
        $this->created_at = $created_at;
        $this->medias = $medias;
    }

    /**
         * Cambia data da "yyyy-mm-dd"  a  "dd-mm-yyyy"
         * 
         * @return String $newDate, date string in the new format
        */
    public function formatDate($dateDB){ // questa funzione legge un valore
        $newDate = date("d-m-Y", strtotime($dateDB));
        return $newDate;
    }

    /**
         * Legge il valore di tags
         * @return Array $tags
        */
    public function getTags(){
        return $this->tags;
    }

    /**
         * Legge il valore della variabile statica $updated_at
         * @return NULL $updated_at
        */
    public static function getStaticupdated_at(){ //metodo statico che chiamo staticamente
        return self::$updated_at;
    }
}

?>