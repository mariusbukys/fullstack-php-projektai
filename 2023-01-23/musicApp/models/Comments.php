<?php

namespace Models;

class Comments extends Database{
    public $table = 'comments';
 
    
    function categoryComments($id){
        
        $result = self::$db->query("SELECT * FROM $this->table WHERE video_id = $id");
       return $result->fetch_all(MYSQLI_ASSOC);

       

    }
}