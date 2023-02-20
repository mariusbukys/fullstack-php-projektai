<?php session_start(); ?>

<?php 
$data = json_decode(file_get_contents('users.json'));

if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'new_user') {
    $data[]= $_POST;
    file_put_contents('users.json', json_encode($data));

    header('Location: ?action=login');
    exit;
}

if(isset($_POST['id']) AND $_POST['id'] != '' AND isset($_POST['password']) AND $_POST['password'] != '') {
    foreach($data as $key=>$user){
    
        if($_POST['id'] === $user->id AND $_POST['password'] === $user->password){
            $_SESSION['user']=$user;
            header('Location: ./messages.php');
            exit;
        }
    }

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

<body class="text-center">

<div>
    <h1 class="fw-bold text-info-emphasis fst-italic text-decoration-underline display-1"><i class="bi bi-binoculars-fill"></i> TRIGGER</h1>
    <a href="?action=login"  class="btn btn-dark ">Prisijungti</a>
    <a href="?action=new_user"  class="btn btn-dark ">Registruotis</a>
</div>
<?php if(isset($_GET['action']) AND $_GET['action'] === 'login') : ?>
    <main class="form-signin w-25 m-auto">
      <form action='' method="POST">
       
        <h1 class="h3 mb-3 fw-normal">Vartotojo prisijungimas</h1>
    
        <div class="form-floating">
          <input type="text" name="id" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Vartotojo ID</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Slaptazodis</label>
        </div>
        <button class="w-100 btn btn-lg btn-secondary" type="submit">Prisijungti</button>
       
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
      </form>
    </main>
     <?php endif?>

    <?php if(isset($_GET['action']) AND $_GET['action'] === 'new_user') : ?>
    <main class="form-signin w-25 m-auto">
      <form action='' method="POST">
       
        <h1 class="h3 mb-3 fw-normal">Naujas Vartotojas</h1>
    
        <div class="form-floating">
          <input type="text" name="name" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Vardas</label>
        </div>
        <div class="form-floating">
          <input type="text" name="surname" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Pavarde</label>
        </div>
        <div class="form-floating">
          <input type="text" name="id" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Vartotojo ID</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Slaptazodis</label>
        </div>
        <div class="d-flex justify-content-start">
        <label for="photo" class="border border-dark px-3 rounded mb-1"><i class="bi me-2 fs-2 bi-person-circle"></i> Nuotrauka</label>
        <input type="file" hidden name="user-photo" id="photo" class="form-control mb-1" />
        
        </div>
       
        <button class="w-100 btn btn-lg btn-secondary" type="submit">Registruotis</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
      </form>
    </main>
     <?php endif ?>

</body>
</html>