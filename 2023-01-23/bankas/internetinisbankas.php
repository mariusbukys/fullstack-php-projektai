<?php




 if(isset($_POST['id']) AND $_POST['id']!='' AND isset($_POST['password']) AND $_POST['password']!='' ){
  if(isset($_POST['id']) AND $_POST['id']==='admin' AND isset($_POST['password']) AND $_POST['password']==='admin' ){
   
    header ("Location: ./manobank.php?page=admin");
     exit;
      } 
  $data = json_decode(file_get_contents('database.json'));
  
  foreach($data as $user){
    if( 
      $_POST['id'] === $user->id AND
      $_POST['password'] === $user->password
    ){
      $_SESSION['user'] = $user;
      header ("Location: ./manobank.php?page=saskaita");
      exit;
    }
  }
    } 
 



?>

<body class="text-center">
    
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
     

</body>
