<?php

namespace Controllers;

use Models\Videos;
use Models\Categories;

class Userpage{

    public static function userPage(){

    // Adding new videos

        $videos = new Videos();
        if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'submit'){
            $videos = $videos->addRecord($_POST);
            header('Location: ?page=user');
            exit;
        }
    // Displaying all videos

        $tracks = new Videos();
        $tracks = $tracks->getVideos();

    // Deleting selected video    

        $delete = new Videos();
        if(isset($_GET['action']) AND $_GET['action'] === 'delete'){
        $delete = $delete->deleteRecord($_GET['id']);
        header('Location: ?page=user');
        exit;
        }

    // Adding categories in video submit form

        $categories = new Categories();
        $categories = $categories->getRecords();

    // Adding new categories to categorie table mysql

        $addcategorie = new Categories();
        if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'add'){
        $addcategorie = $addcategorie->addRecord($_POST);
        header('Location: ?page=user');
        exit;
        }

        include 'views/bootstrap.php';
        include 'views/user.php';
    }
}