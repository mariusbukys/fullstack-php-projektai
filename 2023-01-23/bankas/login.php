<?php




 if(isset($_POST['id']) AND $_POST['id']==='65451351' AND isset($_POST['password']) AND $_POST['password']==='1234' ){
   
  header ("Location: ./saskaita.php");
   
    } 
 if(isset($_POST['id']) AND $_POST['id']==='admin' AND isset($_POST['password']) AND $_POST['password']==='admin' ){
   
  header ("Location: ./admin.php");
   
    } 



?>

<body class="text-center container">
    
    <main class="form-signin w-25 m-auto">
      <form action='' method="POST">
       
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
        <div class="form-floating">
          <input type="text" name="id" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">User ID</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
      </form>
    </main>
     

</body>
