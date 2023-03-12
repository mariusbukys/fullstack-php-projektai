
<body class="bg-dark">
    
<div class="px-4   pb-5">
    <div class="p-3 d-flex border-bottom justify-content-between">
        <a class="text-decoration-none  text-danger display-6" href="index.php"><i class="bi text-white fs-2 bi-boombox"></i> Music<span class="fw-bold text-danger-emphasis">Box</span></a>
        
    
  <!-- Video search form -->

     <form  method="GET">
        <div class="d-flex">
        <input class="form-control w-100 my-2 " type="find" name="find" placeholder="Search..." aria-label="Search">
        </div>
    </form>
     
 <!-- Register and login buttons  -->

      <div>
      <a href="?action=register&page=register" class="btn btn-secondary my-2">Register</a>
      <a href="?action=login&page=login" class="btn btn-secondary my-2">Login</a>
      </div>

   
 </div>

 <!-- Display list of categories -->

    <nav class="" >
        <ul class="d-flex justify-content-center  ">
            <?php foreach($categories as $category): ?>
                <li class="nav-item  m-3 px-3 border rounded-pill bg-secondary">
                    <a class="text-decoration-none text-white " href="?page=category&id=<?=$category['id']?>"><?=$category['name']?></a>
                </li>
             <?php endforeach; ?>   
        </ul>
    </nav>

    <!-- Display all videos -->
    
    <div class="">
    <div class="row ms-5">
      
       <?php foreach($videos as $video): ?>

        <div style="width: 350px;" class=" mb-5 ">
            <a href="?page=video&id=<?=$video['vid_id']?>" ><img class="rounded " src="<?=$video['thumbnail_url']?>"/></a>
            <div class="d-flex mt-2">
            <img style="height:40px;width: 40px;" class="border border-white rounded-circle" src="./views/uploads/<?=$video['user_photo'] ?>"/>
            <div class="ms-2">
                <p class="m-0 text-white"><?=$video['video_name']?></p>
                <p class="m-0 text-white opacity-75"><?=$video['user_name']?></p>
                <p style="font-size: 10px;" class="m-0 text-white opacity-75"><?=$video['created_at']?></p>
            </div>
        </div>
        </div>
        <?php endforeach ?>
     
    </div>
       </div>
</div>
</body>
</html>