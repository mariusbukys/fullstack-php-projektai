<?php
 if(empty($_SESSION['user']) OR $_SESSION['user']['role'] === '1') {
    header('Location: ?page=login');
    exit;
 }
 $user = $_SESSION['user']['id'];

 $songs = $database->query("SELECT * FROM songs");
 $songs = $songs->fetch_all(MYSQLI_ASSOC);


 
 if(isset($_POST['playlist'])){
    $list = $_POST['check'];
    foreach($list as $item){
            foreach($songs as $artist){
               if($item === $artist['id']){
                $name = $artist['name'];
                $author = $artist['author'];
                $query = "INSERT INTO playlist (name,user_id,songs) VALUES ('$name', '$user', '$author')";
                $database->query($query);
               }

            }
        
        
    
      
 }
     header('Location: ?page=user');
      exit;
}
$tracks = $database->query("SELECT * FROM playlist");
$tracks = $tracks->fetch_all(MYSQLI_ASSOC);

if(isset($_GET['action']) AND $_GET['action'] === 'delete'){
    $id = $_GET['id'];
    $query = "DELETE FROM `playlist` WHERE id ='$id'";
    $database->query($query);
    header('Location: ?page=user');
    exit; 
}

?>

<div class=" px-3 pb-5">
<div class="text-end border-bottom border-secondary pb-2 ">
<a href="?page=login.php" class="btn text-white bg-success"><i class="bi text-white bi-power"></i>Logout</a>
</div>
<div class="row">
<div class="col-3 bg-dark bg-opacity-75">
<h1 class="mb-2  border-bottom  border-secondary text-success">My Playlist</h1>
<div class="">
<table class="table border-secondary text-light">
    <thead>
    <tr> 
         <th>#ID</th>
         <th>Song</th>
         <th>Author</th> 
         <th>Action</th>       
    </tr>
    </thead>
    <tbody>
        <?php foreach($tracks as $track) : ?>
            <?php if($track['user_id'] === $user) : ?>
        <tr>
            <td><?=$track['id'] ?></td>
            <td><?=$track['name'] ?></td>
            <td><?=$track['songs'] ?></td>
            <td><a href="?page=user&action=delete&id=<?=$track['id'] ?>" class="text-warning-emphasis"><i class="bi bi-trash"></i></a></td>
        </tr>
        <?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>
</div>
</div>
<div class="col-9 bg-dark bg-opacity-75">
<h1 class=" mb-2 border-bottom border-secondary text-success">Playlist</h1>
<form method="POST">
<div class="row ">
<div class="d-flex justify-content-end">
    <button name="playlist" class="btn bg-success text-white">Add</button>
</div>
<?php foreach($songs as $song) : ?>
    <div class="text-white border border-secondary rounded bg-dark pt-3 col-2 d-flex m-3">
        <input type="checkbox" name="check[]" value="<?=$song['id']?>" class="me-2"/>
        <div>
        <img style="height:5rem;width: 5rem;" src="./uploads/<?=$song['photo'] ?>">
       
            <p style="font-size: 14px;" class="p-0 m-0"><?=$song['name'] ?></p>
            <p style="font-size: 13px;"  class="p-0 fst-italic text-success"><?=$song['author'] ?></p>
            
        </div>
    </div>
    <?php endforeach ?>  

</div>
</form>
        </div>
      </div>
     </div>