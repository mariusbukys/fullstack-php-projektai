<?php
session_start();
try{
    $database = new mysqli('localhost', 'root', '', 'spotify' );
} catch(Exeption $error){
    echo '<h2>Nepavyko prisijungti prie duomenu bazes</h2>';
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body style="background-image: url('https://kreativgesellschaft.org/site/assets/files/1050/keyvisual_music_worx_final-3.png');" class="bg-dark">
  
  <div class="container text-center">
  <h1 class="fw-bold fst-italic mt-5 display-1 text-success-emphasis"><i class="bi bi-tsunami"></i></i> Sound<span class="text-warning-emphasis">Wave</span></h1>
   <?php if(isset($_GET['message'])) : ?>
    <div class="d-flex justify-content-center">
  <div class=" w-50 alert alert-<?=$_GET['status']?>">
    <?= $_GET['message'] ?>
  </div>
   </div>
  <?php endif; ?>

    <?php

    
  $page = isset($_GET['page']) ? $_GET['page'] : '';

  switch($page){
    case 'admin':
        include './admin.php';
    break;
    case 'user':
        include './user.php';
    break;
    case 'login':
        include './login.php'; 
      break;      
    default:
        include './login.php'; 
       
  }
    ?>
    </div>
    
</body>
</html>

