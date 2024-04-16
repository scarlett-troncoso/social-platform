<?php

/**
 * ### Class PostExtend
 * describes post information obtained from the relative post
 */
class PostExtend extends Post {

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
    public function __construct($id, $user_id, $title, $date, $tags, $created_at, $medias) 
        {
            parent::__construct($id, $user_id, $title, $date, $tags, $created_at, $medias);
        }
}

/**
 * ### Class MediaExtend
 * describes Post information and media information obtained from the relative Media
 */
class MediaExtend extends Media {

    /**
        * @param Int $id -- post id
        * @param Int $user_id -- user id
        * @param String $title -- post title
        * @param String $date -- post date
        * @param Array $tags -- post tags
        * @param String $created_at -- post creation date
        * @param String $type -- media type
        * @param String $path -- media path
        */
    public function __construct(public int $id, public int $user_id, public string $title, public string $date, public $tags, public string $created_at, $type, $path)
        {
            parent::__construct($type, $path); 
        
            $this->id = $id;
            $this->user_id = $user_id;
            $this->title = $title;
            $this->date = $date;
            $this->tags = $tags;
            $this->created_at = $created_at;
        }
    
    /**
         * Change date from  "yyyy-mm-dd"  to  "dd-mm-yyyy"
         * 
         * @return String $newDate, date string in the new format
        */
    public function formatDate($dateDB)
        { // questa funzione legge un valore
            $newDate = date("d-m-Y", strtotime($dateDB));
            return $newDate;
        }
    }