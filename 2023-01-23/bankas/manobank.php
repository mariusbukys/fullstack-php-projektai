<?php session_start(); ?>
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
<body>
    <div class="container bg-body-tertiary px-0">
    <?php
    
      include("./header.php");
      
     

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch($page) {
    case 'kortele':
        include './kortele.php';
        break;
    case 'paskolos':
        include './paskolos.php';
        break;
    case 'pensija':
        include './pensija.php';
        break;
    case 'bankas':
        include './internetinisbankas.php';
        break;
    case 'admin':
        include './admin.php';
        break;
    case 'saskaita':
        include './saskaita.php';
        break;
    case 'logout':
        session_destroy();
        include './internetinisbankas.php';
        break;
    default: 
        include './main.php';
}
include("./footer.php");
    ?>
    </div>
</body>
</html>