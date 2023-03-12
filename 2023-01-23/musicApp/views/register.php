

<body class="bg-dark">

<div class="ps-5 pt-3">
<a class="text-decoration-none  text-danger display-6" href="index.php"><i class="bi text-white fs-2 bi-boombox"></i> Music<span class="fw-bold text-danger-emphasis">Box</span></a>
</div>

<!-- Alert message -->

<?php if(isset($_GET['message'])) : ?>
    <div class="d-flex justify-content-center">
  <div class=" w-50 alert alert-<?=$_GET['status']?>">
    <?= $_GET['message'] ?>
  </div>
   </div>
  <?php endif; ?>

  <!-- Login form -->

<?php if(isset($_GET['action']) AND $_GET['action'] === 'login') : ?>
    <main class="form-signin w-25 m-auto">
      <form method="POST">
       
        <h1 class="h3 mb-3 text-white fw-normal">User Login</h1>
    
        <div class="form-floating">
          <input type="text" name="user_email" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-secondary" type="submit">Login</button>
       
      
      </form>
    </main>
     <?php endif?>

     <!-- Register form -->

     <?php if(isset($_GET['action']) AND $_GET['action'] === 'register') : ?>
    <main class="form-signin w-25 m-auto">
      <form method="POST" enctype="multipart/form-data">
       
        <h1 class="h3 mb-3 text-white fw-normal">New User</h1>
    
        <div class="form-floating">
          <input type="text" name="user_name" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">User name</label>
        </div>
        <div class="form-floating">
          <input type="text" name="nickname" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">User nickname</label>
        </div>
        <div class="form-floating">
          <input type="text" name="user_email" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="d-flex justify-content-start">
        <label for="photo" class="border border-dark px-3 bg-white rounded mb-1"><i class="bi me-2 fs-2 bi-person-circle"></i> User photo</label>
        <input type="file" hidden name="user_photo" id="photo" class="form-control mb-1" />
        
        </div>
       
        <button class="w-100 btn btn-lg btn-secondary" type="submit">Registruotis</button>
       
      </form>
    </main>
     <?php endif ?>
    </body>
    </html>