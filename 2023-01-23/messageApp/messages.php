<?php session_start(); ?>
<?php
$name = $_SESSION['user']->name;
$id = $_SESSION['user']->id;
$surname = $_SESSION['user']->surname;


$data = json_decode(file_get_contents('users.json'),true);

$comments = $data['comments'];

$order = isset($_GET['order']) ? $_GET['order'] : 'asc';

if($order === 'desc'){
    usort($comments, function($a, $b){
        if($a == $b){
            return 0;
        }
        return ($b < $a) ? -1 : 1;
    });
}

if(!empty($_POST['text'])){
    $data['comments'][] = [
        'message' => $_POST['text'],
        'created' => date("Y-m-d h:i:sa"),
        'name' => $name.' '.$surname
    ];
   

   if(!empty($_FILES['photo']['tmp_name'])){
    if(!is_dir('./uploads')){
        mkdir('./uploads');
    }
    $filename = explode('.',$_FILES['photo']['name']);
    $filename = time().'.'. $filename[count($filename)-1];
    $fileTypes = ['image/jpeg','image/png','image/gif'];

    if(!in_array($_FILES['photo']['type'],$fileTypes)){
        header('Location: ./messages.php?message=Incorrect file format&status=danger');
        exit;
    }
    move_uploaded_file($_FILES['photo']['tmp_name'], './uploads/' . $filename);
   
    $data['comments'][count($data['comments'])-1]['image'] = $filename;
   }
   file_put_contents('users.json', json_encode($data));

   header('Location: ./messages.php?message=Upload successfull&status=success');
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
<body class="">

    <div class="container pt-0 bg-light">

   
   <div class="text-end pt-4">
   
   <a href="./login.php" class="btn text-white bg-dark"><i class="bi text-white bi-power"></i>Atsijungti</a>
   </div>
   <div class="text-center mb-5">
   <h1 class="fw-bolder text-info-emphasis fst-italic text-decoration-underline display-1"><i class="bi bi-binoculars-fill"></i> TWIGGER</h1>
</div>


  <div class="border p-5 rounded bg-opacity-75 bg-secondary bg-gradient container w-75 mb-4">
    
    <div class="d-flex justify-content-center">
  <div class=" w-75 mb-3">
   <form method="POST" enctype="multipart/form-data">
   <textarea class="form-control mb-2" id="exampleFormControlTextarea1" name="text" maxlength="144" rows="2"></textarea>
   <?php if(isset($_GET['message'])) : ?>
  <div class="alert alert-<?=$_GET['status']?>">
    <?= $_GET['message'] ?>
  </div>
  <?php endif; ?>
   <input type="file" name="photo" class="form-control mb-3" />
   <button class="btn btn-dark" type="submit" >Rasyti komentara</button>
    </form>
    </div>
</div>
<div class="d-flex pb-3 border-bottom justify-content-between mb-3" >
    <h2 class="text-info-emphasis">Latest comments</h2>
    <form class="d-flex">
        
        <select name="order" class="form-control "  >
            <option value="asc">Oldest messages</option>
            <option  value="desc">Newest messages</option>
        </select>
        <button ><i class="bi bi-funnel-fill"></i></button>
    </form>
</div>
 <?php if(isset($_POST)) : ?>
  <div class="d-flex justify-content-center">
   <div class="w-75 ">
    <?php foreach($comments as $user) : ?>
    <div class="card mb-3">
        <div class="card-header text-center">
        <span><i class="bi display-1 bi-person-circle"></i></span>
        <div class=" d-flex justify-content-between ">
        <p class="fs-4 text-info-emphasis fw-bold mb-0 pt-2" ><?=$user['name']?></p>
        <p class="mb-0 pt-3"><?=$user['created']?></p>
       </div>
    </div>
        <div class="card-body  ">
            <?php if(isset($user['image'])) : ?>
                <div class="d-flex bg-secondary py-3 mb-3 justify-content-center">
            <img src="./uploads/<?=$user['image']?>" class="w-50" />
            </div>
            <?php endif ?>
            <div class="fw-bold ">
           <p ><?=nl2br($user['message'])?></p>
           
            </div>
        </div>
    </div>
     <?php endforeach ?>   
   </div>
    </div>
   <?php endif ?>
   </div>
  
   </div> 
</body>
</html>


