<?php 
/*
● il sistema prevede immagini e video 
● all'interno della classe sono dichiarate delle variabili d'istanza
● all'interno della classe è definito un costruttore
● all'interno della classe è definito almeno un metodo
*/

/**
 * ### Class Media
 * describes the type and path of the media
 */
class Media {
    
    /**
        * @param String $type -- media type
        * @param String $path -- media path
        */
    public function __construct(public string $type, public string $path)
    {
        $this->type = $type;
        $this->path = $path; //URL
    }

    /**
         * Organizes media content information in a single string
         * 
         * @return String $info, (type link: path)
        */
    public function getInfoMedia(){ 
       
      $info = $this->type . ' ' . 'link: ' . $this->path ;
       
        return $info;
    }
}
?>