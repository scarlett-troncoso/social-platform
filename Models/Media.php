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
        * @param array $type -- media type
        * @param array $path -- media path
        */
    public function __construct(public array $type, public array $path)
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
        $infoArray = [];
    
        foreach ($this->type as $index => $type) {
            // Aggiungi ogni informazione all'array
            $infoArray[] = $type . ' link: ' . $this->path[$index];
        }
    
        // Unisci tutte le informazioni in una singola stringa separata da un delimitatore (es. una virgola)
        $info = implode(', ', $infoArray);
    
        return $info; // Restituisce la stringa concatenata
    }
}

?>