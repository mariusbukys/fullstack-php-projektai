
<body class="bg-dark">
<div class="row  pb-5 text-white">
<div class="text-end border-bottom  pb-4">
<a href="index.php" class="btn text-white bg-success"><i class="bi text-white bi-power"></i>Logout</a>
</div>

   <div class="col-3 mt-3">
    <div class="d-flex mb-3 justify-content-between">
      <a class="text-decoration-none btn btn-secondary text-white" href="?page=user&action=submit">Add New Video</a>
      <a class="text-decoration-none btn btn-secondary text-white" href="?page=user&action=add">Add Category</a>
    </div>

 <!-- Add new category -->

    <?php if(isset($_GET['action']) AND $_GET['action'] === 'add'): ?>
    <form  method="POST">
     <div class="text-dark d-flex">
        <div class="form-floating">
          <input type="text" name="name" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Add category</label>
        </div> 
        <button class=" btn mb-1  btn-success" type="submit">Add</button> 
    </div>  
    </form> 
    <?php endif; ?>

    <!-- Add new video -->

      <?php if(isset($_GET['action']) AND $_GET['action'] === 'submit'): ?>
   <form  method="POST" enctype="multipart/form-data">
     <div class="text-dark">
        <div class="form-floating">
          <input type="text" name="video_name" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com" required>
          <label for="floatingInput">Video name</label>
        </div>
        <div class="form-floating">
          <input type="text" name="video_url" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com" required>
          <label for="floatingInput">Video link</label>
        </div>
        <div class="form-floating">
          <input type="text" name="thumbnail_url" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com" required>
          <label for="floatingInput">Video photo</label>
        </div>
        <div class="form-floating">
        <select name="category_id" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com" required>
              <?php foreach($categories as $categorie): ?>          
        <option value="<?=$categorie['id'] ?>"><?=$categorie['name'] ?></option>
                       
                <?php endforeach; ?>
         </select>
         
          <label for="floatingInput">Video category</label>
          <input type="hidden" name="user_id" value="<?=$_SESSION['id']?>"></input>
        </div>

  </div>
        <button class="w-100 btn mb-3 btn-lg btn-success" type="submit">Add Video</button>
       
      </form>
      <?php endif; ?>

</div>

<!-- Show video by user id -->

<div class="col-9 mt-3">
<h1 class="h3 mb-3 fw-normal">My videos</h1>
<div class="row">
<?php foreach($tracks as $track): ?>
 <?php if($track['user_id'] === $_SESSION['id']): ?>  
<div style="width: 350px;" class=" mb-5 ">
<a href="?page=video&id=<?=$track['vid_id']?>" ><img class="rounded " src="<?=$track['thumbnail_url']?>"/></a>
   <div class="d-flex justify-content-around mt-2">
   <img style="height:40px;width: 40px;" class="border border-white rounded-circle" src="./views/uploads/<?=$track['user_photo'] ?>"/>
      <div class="ms-2">
        <p class="m-0 text-white"><?=$track['video_name']?></p>
        <p class="m-0 text-white opacity-75"><?=$track['user_name']?></p>
        <p style="font-size: 10px;" class="m-0 text-white opacity-75"><?=$track['created_at']?></p>
      </div>
      <a href="?page=user&action=delete&id=<?=$track['vid_id'] ?>" class="text-warning-emphasis ms-2"><i class="bi bi-trash p-1"></i></a>
   </div>
</div>
<?php endif; ?>
<?php endforeach; ?>
</div>
     </div>
</div>

</body>
</html>