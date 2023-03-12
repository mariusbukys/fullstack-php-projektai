<?php


namespace Models;


class Users extends Database {
    public $table = 'users';

    // Adding user data and photo

    function registerUser($data){
       
            $pass = md5($_POST['password']);
            if(!empty($_FILES['user_photo']['tmp_name'])){
                if(!is_dir('./views/uploads')){
                    mkdir('./views/uploads');
                }
                $filename = explode('.',$_FILES['user_photo']['name']);
                $filename = time().'.'. $filename[count($filename)-1];
                $fileTypes = ['image/jpeg','image/png','image/gif'];
              
                if(!in_array($_FILES['user_photo']['type'],$fileTypes)){
                    header('Location: ?page=register&message=Incorrect file format&status=danger');
                    exit;
                }
                move_uploaded_file($_FILES['user_photo']['tmp_name'], './views/uploads/' . $filename); 
               }
           
            $user = self::$db->query(
                vsprintf("INSERT INTO $this->table (user_name, nickname, user_email, user_password, user_photo) VALUES ('%s', '%s', '%s','$pass','$filename')", $data)
            );
            
            return $user;
     }

     // Cheking for correct login

     function login(){
     
            $email = $_POST['user_email'];
            $pass = md5($_POST['password']);
            $user = self::$db->query("SELECT id FROM $this->table WHERE user_email = '$email' AND user_password = '$pass' ");
      
            return $user;
        }
     
    // Cheking if user exists

     function checkUser(){
        $email = $_POST['user_email'];
        $nick = $_POST['nickname'];
        $user = self::$db->query("SELECT * FROM $this->table WHERE user_email = '$email' OR nickname = '$nick' ");
        
        return $user;
     }
}
