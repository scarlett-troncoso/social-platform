<?php 
/*
all'interno della classe sono dichiarate delle variabili d'istanza
● all'interno della classe è definito un costruttore
● all'interno della classe è definito almeno un metodo
● tra i parametri del costruttore accetta un Media
● BONUS: il costruttore accetta più Media
*/

class Post {


    public static string $updated_at = 'NULL';


    public function __construct(public int $id, public int $user_id, public string $title, public string $date, public array $tags, public string $created_at, public Media $medias)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->date = $date;
        $this->tags = $tags;
        $this->created_at = $created_at;
        $this->medias = $medias;

        //$this->updated_at = $updated_at;
    }

    public function getTags(){ // questa funzione legge un valore
        return $this->tags;
    }

    public static function getStaticupdated_at(){ //metodo statico che chiamo staticamente
        return self::$updated_at;
    }
}

/* **** due opzioni per stampare tags in pagina: *****
**** 1
<?php foreach($post->tags as $tag) : ?>           
    <span><?= '  ' . $tag . ' | '?></span>    
<?php endforeach; ?>

***** 2
<?php foreach($movie->getCast() as $nameCast) : ?>
    <li> <?= $nameCast; ?> </li>
<?php endforeach; ?>*/
?>