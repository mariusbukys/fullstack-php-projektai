<?php

namespace Controllers;

use Models\Videos;
use Models\Categories;


class Homepage {
    public static function index(){

     // Show videos

        $videos = new Videos();
        $videos = $videos->searchVideos();
     
     // Show video categories   

        $categories = new Categories();
        $categories = $categories->getRecords();
       
        include 'views/bootstrap.php';
        include 'views/homepage.php';
    }
    public static function byCategory($id){
     
     // Show video by categorie

        $videos = new Videos();
        $videos = $videos->categoryVideos($id);

     // Show video categories 
     
        $categories = new Categories();
        $categories = $categories->getRecords();
        
        include 'views/bootstrap.php';
        include 'views/homepage.php';
    }
    
}