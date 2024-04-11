<?php 
/*
● il sistema prevede immagini e video 
● all'interno della classe sono dichiarate delle variabili d'istanza
● all'interno della classe è definito un costruttore
● all'interno della classe è definito almeno un metodo
*/
class Media {
    
    public function __construct(public string $type, public string $path)
    {
        $this->type = $type;
        $this->path = $path; //URL
    }
   /*
    public function getInfoMedia(){ // trovare il modo che pt, faccia solo una volta
        $info = '';
        foreach ($this->path as $pt) {
           $info = $info .  $this->type . ' ' . 'link: ' . $pt ;
        }
        return $info;
    }*/

    public function getInfoMedia(){ 
       
      $info = $this->type . ' ' . 'link: ' . $this->path ;
       
        return $info;
    }
}
?>