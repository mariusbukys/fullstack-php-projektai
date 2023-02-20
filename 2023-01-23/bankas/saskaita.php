<?php


  if(!isset($_SESSION['user'])) {
    header('Location: ?page=bankas');

}
$data = json_decode(file_get_contents('database.json'));


if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'new_transfer'){
  $currentUser = [];
  $transferCost = 0.43;
 

  foreach($data as $user){
    if($user->id === $_SESSION['user']->id)
    $currentUser = $user;
  }
  if(($_POST['amount'] + $transferCost) > $currentUser->cash){
    header('Location: ?page=saskaita&message=Nepakankamas saskaitos likutis&status=danger');
    exit;
  }
 
  foreach($data as $key=>$user){
    if($_POST['receiver'] === $user->id){
      $transaction = $_POST['amount'];
      $data[$key]->cash += $_POST['amount'];
      $data[$key]->history[] = $transaction;
    }
    if($_SESSION['user']->id === $user->id){
      $data[$key]->cash -= $_POST['amount'] + 0.43;
    }
  }
  file_put_contents('database.json', json_encode($data));
  header('Location: ?page=saskaita&message=Pavedimas ivyko sekmingai&status=success');
  exit;
}

$client = array_filter($data, function($user){
  if($user->id != $_SESSION['user']->id)
  return $user;
})

?>
     <div class=" d-flex justify-content-end">
<a href="?page=logout" class="btn btn-dark m-2"> Atsijungti </a>
</div>
<div class="bg-secondary  ">
<table class="table text-white">
    <tr class="border">
        <th class="border">#ID</th>
        <th class="border">Vardas</th>
        <th class="border">Pavarde</th>
        <th class="border">Saskaita</th>
        <th class="border">Balansas</th>
    </tr>
 <tr class="border">
          <td class="border"><?=  $_SESSION['user']->id  ?></td>
          <td class="border"><?= $_SESSION['user']->name  ?></td>
          <td class="border"><?= $_SESSION['user']->surname ?></td>
          <td class="border">LT<?=  $_SESSION['user']->iban ?></td>
          <td class="border"><i class="bi bi-currency-euro"></i><?= $_SESSION['user']->cash ?></td>
     </tr>
     </table>
     </div>
<h2>Pavedimu Istorija </h2>
     <div class="bg-secondary  ">
<table class="table text-white">
    <tr class="border">
        <th class="border">Nuo/Kam</th>
        <th class="border">Suma</th>
    </tr>
   
      <?php foreach($client as $index=>$user) : ?>
        <tr class="border">
        <td class="border"><?=$user->name.' '.$user->surname?></td>
        <td class="border"><?=$user->history?></td>
        </tr>
        <?php endforeach ?>
   
</table>
</div>
     <div class=" d-flex justify-content-center">

<a href="?page=saskaita&action=new_transfer" class="btn btn-success m-2"> Naujas Pavedimas </a>
</div>
<?php if(isset($_GET['message'])) : ?>
  <div class="alert alert-<?= $_GET['status'] ?>">
        <?= $_GET['message'] ?>
  </div>
  <?php endif ?>

<?php if(isset($_GET['action']) AND $_GET['action'] === 'new_transfer') :?>
  <form method="POST" class="w-50"> 
    <div class="d-flex ">
      <label class="col-2 m-2"> Gavejas</label>
      <select name="receiver" class="form-control ms-4 w-50">
        <?php foreach($client as $account) : ?>
          <option value="<?= $account->id ?>"><?=$account->name. ' ' .$account->surname ?></option>
          <?php endforeach; ?>
      </select>
    </div>
     <div class="d-flex "> 
     
      <label class="m-2">Pavedimo suma<label>
       <input type="number" step="0.01" name="amount" class="ms-3 form-control " >
     </div>
     <button class="btn btn-success m-2" >Siusti</button>
  </form>
  <?php endif ?>