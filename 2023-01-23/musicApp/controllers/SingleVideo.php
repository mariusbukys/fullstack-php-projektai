<?php

namespace Controllers;

use Models\Videos;
use Models\Comments;

class SingleVideo{
    public static function showVideo($id){

    // Displaying videos
        
        $videos = new Videos();
        $videos = $videos->getVideos();

    // Adding comments to the video

        $comments = new Comments();
         if(!empty($_POST)){
        $comments = $comments->addRecord($_POST);
        header('Location: index.php');
        exit;
     }

    // Displaying comments
        $comments = new Comments();
        $comments = $comments->categoryComments($id);
       
    
        include 'views/bootstrap.php';
        include 'views/singlevideo.php';
    }
}