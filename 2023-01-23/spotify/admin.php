<?php
 if(empty($_SESSION['user']) OR $_SESSION['user']['role'] === '0') {
    header('Location: ?page=login');
    exit;
 }
 
 if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'add'){
 

 if(!empty($_FILES['photo']['tmp_name'])){
  if(!is_dir('./uploads')){
      mkdir('./uploads');
  }
  $filename = explode('.',$_FILES['photo']['name']);
  $filename = time().'.'. $filename[count($filename)-1];
  $fileTypes = ['image/jpeg','image/png','image/gif'];

  if(!in_array($_FILES['photo']['type'],$fileTypes)){
      header('Location: ?page=admin&message=Incorrect file format&status=danger');
      exit;
  }
  move_uploaded_file($_FILES['photo']['tmp_name'], './uploads/' . $filename);
 
  
 }
 $query = vsprintf("INSERT INTO songs (name, author, album, year, link, photo) VALUES ('%s', '%s', '%s','%s','%s','$filename')", $_POST);
  $database->query($query);
  header('Location: ?page=admin');
  exit; 
};
if(isset($_GET['action']) AND $_GET['action'] === 'delete'){
  $id = $_GET['id'];
  $query = "DELETE FROM `songs` WHERE id ='$id'";
  $database->query($query);
  header('Location: ?page=admin');
  exit; 
}
$songs = $database->query("SELECT * FROM songs");
$songs = $songs->fetch_all(MYSQLI_ASSOC);
// print_r($songs);

if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'edit'){
  
  $id = $songs[$_GET['id']]['id'];
  $name=$_POST['name1'];
  $author=$_POST['author1'];
  $album=$_POST['album1'];
  $year=$_POST['year1'];
  $link=$_POST['link1'];
  $photo=$_POST['photo1'];
  $query = "UPDATE songs SET name='$name', author='$author', album='$album', year='$year', link='$link' WHERE id='$id'";
  $database->query($query);
  header('Location: ?page=admin');
  exit; 
}



?>
<div class="row bg-dark bg-opacity-75 pb-5 text-success">

<h1 class="fw-bold display-3 mb-0 text-success-emphasis  ">Admin</h1>
<div class="text-end border-bottom  pb-4">
<a href="?page=login.php" class="btn text-white bg-success"><i class="bi text-white bi-power"></i>Logout</a>
</div>
    <div class="col-3 mt-3">
    <a href="?page=admin&action=add" class="h3 mb-3 fw-normal">Add/Edit New Songs</a>
        <?php if(isset($_GET['message'])) : ?>
  <div class="alert alert-<?=$_GET['status']?>">
    <?= $_GET['message'] ?>
  </div>
  <?php endif; ?>
  <?php if(isset($_GET['action']) AND $_GET['action'] === 'add'):?>
   <form  method="POST" enctype="multipart/form-data">
        <div class="form-floating">
          <input type="text" name="name" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Song name</label>
        </div>
        <div class="form-floating">
          <input type="text" name="author" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Author</label>
        </div>
        <div class="form-floating">
          <input type="text" name="album" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Album</label>
        </div>
        <div class="form-floating">
          <input type="text" name="year" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Year</label>
        </div>
        <div class="form-floating">
          <input type="text" name="link" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">YouTube Link</label>
        </div>
        <div class="form-floating">
          <input type="file" name="photo" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Album photo</label>
        </div>
       
        <button class="w-100 btn mb-3 btn-lg btn-success" type="submit">Add Song</button>
       
      </form>
      <?php endif ?>
      <?php if(isset($_GET['action']) AND $_GET['action'] === 'edit'): $song=$songs[$_GET['id']];?>
          
        <form  method="POST" enctype="multipart/form-data">
        <div class="form-floating">
          <input type="text" name="name1" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com" value="<?=$song['name'] ?>">
          <label for="floatingInput">Song name</label>
        </div>
        <div class="form-floating">
          <input type="text" name="author1" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com" value="<?=$song['author'] ?>">
          <label for="floatingInput">Author</label>
        </div>
        <div class="form-floating">
          <input type="text" name="album1" class="form-control border-dark mb-1" id="floatingInput" placeholder="name@example.com" value="<?=$song['album'] ?>">
          <label for="floatingInput">Album</label>
        </div>
        <div class="form-floating">
          <input type="text" name="year1" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password" value="<?=$song['year'] ?>">
          <label for="floatingPassword">Year</label>
        </div>
        <div class="form-floating">
          <input type="text" name="link1" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password" value="<?=$song['link'] ?>">
          <label for="floatingPassword">YouTube Link</label>
        </div>
        <div class="form-floating">
          <input type="file" name="photo1" class="form-control border-dark mb-1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Album photo</label>
        </div>
       
        <button class="w-100 btn mb-3 btn-lg btn-success" type="submit">Edit Song</button>
       
      </form>
      <?php endif ?>
</div>
<div class="col-9 mt-3">
<h1 class="h3 mb-3 fw-normal">Playlist</h1>
      <table class="table text-success">
        <thead>
            <tr> 
                <th>#ID</th>
                <th>Album Photo</th>
                <th>Song Name</th>
                <th>Author</th>
                <th>Album</th>
                <th>Year</th>
                <th>Link</th>
                <th>Date Added</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($songs as $key=>$song) : ?>
            <tr class="text-white">
                <td><?=$song['id'] ?></td>
                <td><img style="height:40px;width: 40px;" src="./uploads/<?=$song['photo'] ?>"></td>
                <td><?=$song['name'] ?></td>
                <td><?=$song['author'] ?></td>
                <td><?=$song['album'] ?></td>
                <td><?=$song['year'] ?></td>
                <td><?=$song['link'] ?></td>
                <td><?=$song['created'] ?></td>
                <td>
                  <div>
                  <a href="?page=admin&action=edit&id=<?=$key ?>" class="text-warning-emphasis "><i class="bi bi-pencil p-1"></i></a>
                 <a href="?page=admin&action=delete&id=<?=$song['id'] ?>" class="text-warning-emphasis "><i class="bi bi-trash p-1"></i></a>
                  </div>
                </td>
            </tr>
            <?php endforeach ?>    
        </tbody>
      </table>
     </div>
</div>