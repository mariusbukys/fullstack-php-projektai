 <?php
if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'register') {
    $nick = $_POST['nickname'];
    $email =$_POST['email'];
    $pass = md5($_POST['password']);
    if($database->query("INSERT INTO users (nickname, email, password) VALUES ('{$nick}','{$email}','{$pass}')")){
        header('Location: ?page=login&message=User created succesfully&status=success');
        exit;
    }

    
}

if(!empty($_POST)) {
    $email =$_POST['email'];
    $pass = md5($_POST['password']);
    $user = $database->query("SELECT id, role FROM users WHERE email = '{$email}' AND password = '{$pass}' ");
    
    if($user->num_rows === 0){
        header('Location: ?page=login&message=User doesn`t exist&status=danger');
        exit;
    }
     $user = $user->fetch_row();
     $_SESSION['user']['id'] = $user[0];   
     $_SESSION['user']['role'] = $user[1]; 
     if($user[1] === '0') 
        header('Location: ?page=user');
      
     else
        header('Location: ?page=admin');
     exit;       
       
   

}

 ?>
 
 <div class="mt-5">
    <!-- <h1 class="fw-bold mb-3 text-success fst-italic  display-1"><i class="bi bi-soundwave"></i> Spoti<span class="text-warning-emphasis">Five</span></h1> -->
    <a href="?action=login&page=login"  class="btn  btn-success ">Login</a>
    <a href="?action=register&page=login"  class="btn ms-3 btn-success ">Register</a>

  </div>
<?php if(isset($_GET['action']) AND $_GET['action'] === 'login') : ?>
    <main class="form-signin w-25 m-auto">
      <form action='' method="POST">
       
        <h1 class="h3 mb-3 fw-normal">User Login</h1>
    
        <div class="form-floating">
          <input type="text" name="email" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
       
        <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
      </form>
    </main>
     <?php endif?>

    <?php if(isset($_GET['action']) AND $_GET['action'] === 'register') : ?>
    <main class="form-signin w-25 m-auto">
      <form method="POST">
       
        <h1 class="h3 mb-3 fw-normal">New User</h1>
    
        <div class="form-floating">
          <input type="text" name="nickname" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Nickname</label>
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Password</label>
        </div>
        
       
        <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
      </form>
    </main>
     <?php endif ?>

