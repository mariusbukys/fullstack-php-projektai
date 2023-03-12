<?php

namespace Models;

class Videos extends Database {
    public $table = 'videos';
    
// Video display by categorie

public function categoryVideos($id){
    $result = self::$db->query("SELECT * FROM $this->table INNER JOIN users WHERE category_id = $id AND videos.user_id = users.id ");
   return $result->fetch_all(MYSQLI_ASSOC);
}
 
// Display all videos or by key word

public function searchVideos(){
    $search = false;
    if(isset($_GET['find'])){
      $find = $_GET['find'];
      $search = true;
    }
  if($search){
    $result = self::$db->query("SELECT * FROM $this->table INNER JOIN users WHERE videos.user_id = users.id AND video_name LIKE '%$find%'");
    return $result->fetch_all(MYSQLI_ASSOC);
  }else{
    return self::$db->query("SELECT * FROM $this->table INNER JOIN users WHERE videos.user_id = users.id")->fetch_all(MYSQLI_ASSOC);
  
  }
}


public function getVideos() {
  return self::$db->query("SELECT * FROM $this->table INNER JOIN users WHERE videos.user_id = users.id")->fetch_all(MYSQLI_ASSOC);
}

}