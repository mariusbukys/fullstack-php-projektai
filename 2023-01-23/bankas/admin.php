<?php


//   if(!isset($_SESSION['user'])) {
//     header('Location: ?page=bankas');
// };


$data = json_decode(file_get_contents('database.json'));
if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'new_user'){
  $userexists = array_filter($data, function($user){
    if($_POST['id']===$user->id OR $_POST['iban']===$user->iban)
    return $user;
  });
  if(count($userexists) > 0){
    header('Location: ?page=admin&message=Toks vartotojas jau egzistuoja&status=danger');
    exit;
  }
$data[] = $_POST;
$users = json_encode($data);
file_put_contents('database.json',$users);
header("Location: ?page=admin&message=Vartotojas sekmingai pridetas&status=success");
exit;

};
if(isset($_GET['action']) AND $_GET['action'] === 'delete'){
  //istriname pasirinkta faila pagal 'id'
  unset($data[$_GET['id']]);
  //uzkoduojame vel json formatu ir idedame i duomenu baze
  file_put_contents('database.json', json_encode(array_values($data)));
  //griztame atgal i pildymo forma
  header("Location: ?page=admin");
exit;
}

if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'edit_user'){
 $data[$_GET['id']] = $_POST;

  file_put_contents('database.json', json_encode($data));
 
  header("Location: ?page=admin");
  exit;

 }



?>
<div class="">
  <div class="d-flex justify-content-between my-3">
 <h2 class="ps-3">Vartotoju informacija</h2>
 <a href="?page=logout"  class="btn btn-dark">Atsijungti <i class="bi fs-5 bi-power"></i></a>
  </div>
<table class="table border text-center bg-secondary text-white">
 <thead>
 <tr class="border">
    <th class="border" >#ID</th>
    <th class="border" >Vardas</th>
    <th class="border" >Pavarde</th>
    <th class="border" >IBAN</th>
    <th class="border" >Balansas</th>
    <th class="border" >Veiksmai</th>
  </tr>
 </thead>
  <tbody>
    <?php foreach ($data as $index => $user) : ?>
      <tr class="border">
          <td class="border"><?= $user->id; ?></td>
          <td class="border"><?= $user->name; ?></td>
          <td class="border"><?= $user->surname; ?></td>
          <td class="border">LT<?= $user->iban; ?></td>
          <td class="border"><i class="bi bi-currency-euro"></i><?= $user->cash; ?></td>
          <td class="border">
              <a href="?page=admin&action=delete&id=<?= $index ?>" class="btn bg-dark-subtle"><i class="bi bi-trash"></i></a>
              <a href="?page=admin&action=edit_user&id=<?= $index ?>" class="btn bg-dark-subtle"><i class="bi bi-pencil"></i></a>
              
          </td>
     </tr>
      <?php endforeach; ?>
  </tbody>
</table>
<?php if(isset($_GET['message'])) : ?>
  <div class="alert alert-<?=$_GET['status']?>">
    <?= $_GET['message'] ?>
  </div>
  <?php endif; ?>

<div class="d-flex justify-content-between my-3 ">
 <h2 class="ps-3">Naujas vartotojas</h2>
 <a href="?page=admin&action=new_user&id=<?= $index ?>"  class="btn btn-dark ">Ivesti vartotoja</a>
  </div>

<?php if(isset($_GET['action']) AND $_GET['action'] === 'new_user') : ?>

<form class="w-50 mt-5" method="POST">
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2 ">Vartotojo ID</label>
    <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
   
  </div>
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2">Vardas</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2">Pavarde</label>
    <input type="text" name="surname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2">IBAN</label>
    <input type="text" name="iban" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>

  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2">Balansas</label>
    <input type="text" name="cash" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputPassword1" class="col-3 ms-2">Slaptazodis</label>
    <input type="text" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-dark">Ivesti</button>
  
</form>
<?php endif ?>
</div>

<?php
 if(isset($_GET['action']) AND $_GET['action'] === 'edit_user') :
  $user = $data[$_GET['id']];

 
?>
<div class="">
<form class="w-50 mt-5" method="POST">
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2 ">Vartotojo ID</label>
    <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$user->id?>">
   
  </div>
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2">Vardas</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$user->name?>">
   
  </div>
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2">Pavarde</label>
    <input type="text" name="surname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$user->surname?>">
   
  </div>
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2">IBAN</label>
    <input type="text" name="iban" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$user->iban?>">
   
  </div>

  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputEmail1" class="col-3 ms-2">Balansas</label>
    <input type="text" name="cash" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$user->cash?>">
   
  </div>
  <div class="mb-3 d-flex justify-content-between">
    <label for="exampleInputPassword1" class="col-3 ms-2">Slaptazodis</label>
    <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="<?=$user->password?>">
  </div>
  <button type="submit" class="btn btn-dark">Atnaujinti</button>
</div>
<?php endif ?>

<?php
 if(isset($_GET['action']) AND $_GET['action'] === 'transfer') :
  $user = $data[$_GET['id']];
?>
<form class="w-50 mt-5" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Vardas</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$user->name?>">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Balansas <i class="bi bi-currency-euro"></i></label>
    <input type="text" name="cash" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$user->cash?>">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Suma pervesti <i class="bi bi-currency-euro"></i></label>
    <input type="text" name="cash_trans" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Gavejo ID</label>
    <input type="text" name="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
   
  </div>
  <button type="submit" class="btn btn-secondary">Pervesti</button>
 </form>
<?php endif ?>