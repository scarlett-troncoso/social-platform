<?php 
/*
● il sistema prevede immagini e video
● all'interno della classe sono dichiarate delle variabili d'istanza
● all'interno della classe è definito un costruttore
● all'interno della classe è definito almeno un metodo
*/
class Media {
    public function __construct(public int $id, public int $user_id, public string $type, public string $path, public string $created_at, public string $updated_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->type = $type;
        $this->path = $path;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
?>