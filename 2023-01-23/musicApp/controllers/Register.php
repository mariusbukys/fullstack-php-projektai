<?php

namespace Controllers;

use Models\Users;


class Register{

  public static function addUser(){

  // Cheking if user exists and adding a new one

    $users = new Users();
    if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'register'){
    
    $user = $users->checkUser();
     
    if($user->num_rows > 0) {
      header('Location: ?action=register&page=register&message=User email or nickname already exists&status=danger');
      exit;
    }
    $users = $users->registerUser($_POST);

    header('Location: ?action=login&page=login&message=User created succesfully&status=success');
    exit;
  }
    include 'views/bootstrap.php';
    include 'views/register.php';
 }


  public static function loginUser(){

 // Cheking if user exists and loging in
 
    $user = new Users();
    if(!empty($_POST) AND $_POST['user_email'] !=""){
     
    $user = $user->login();
    
    if($user->num_rows === 0){
        header('Location: ?action=login&page=login&message=User doesn`t exist or inccorect login information&status=danger');
        exit;
       }
       $user = $user->fetch_row();
       $_SESSION['id'] = $user[0];
       

       header('Location: ?page=user');
       exit;
    }
   
    include 'views/bootstrap.php';
    include 'views/register.php';
  } 
}