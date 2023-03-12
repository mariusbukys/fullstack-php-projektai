

<body class="px-4 bg-dark pb-5">
    
    <div class="p-3">
        <a class="text-decoration-none  text-danger display-6" href="index.php"><i class="bi text-white fs-2 bi-boombox"></i> Music<span class="fw-bold text-danger-emphasis">Box</span></a>
    </div>

    <!-- Showing single video with iframe -->

    <div class="row" >
        <div class="col-9">
        <?php foreach($videos as $video): $id=$_GET['id'] ?>
        
           <?php if($id == $video['vid_id']):?>
        
            <div class=" ps-5 text-start mt-3 ">
                <div class="ratio ratio-16x9">
      <iframe class="border border-secondary"  src="<?= $video['video_url'] ?>"></iframe>
           </div>
      <div class="d-flex mt-2">
   <img style="height:75px;width: 75px;" class="border border-white rounded-circle" src="./views/uploads/<?=$video['user_photo'] ?>"/>
      <div class="ms-2">
        <h4 class="m-0 text-white"><?=$video['video_name']?></h4>
        <p class="m-0 text-white opacity-75"><?=$video['user_name']?></p>
        <p style="font-size: 10px;" class="m-0 text-white opacity-75"><?=$video['created_at']?></p>
      </div>
   </div>
    </div>
        <?php endif ?> 
     <?php endforeach ?> 

<!-- Comments form -->

    <?php if(isset($_GET['id'])): $id = $_GET['id'] ?>
     <div class=" w-50 ms-5 my-4">
        <form method="POST">
            <div class="d-flex">
            <input class="form-control w-50 mb-2" type="text" name="user_name" placeholder="your name"></input>
            <textarea class="form-control ms-2 mb-2"  name="text" maxlength="144" rows="1" placeholder="comment.."></textarea>
            <input type="hidden" name="video_id" value="<?=$id?>"></input>
        </div>
            <button class="btn btn-secondary" type="submit">Leave comment</button>
         </form>
    </div>
    <?php endif ?>

<!-- Display unregistered users comments -->
    <div>
        <?php foreach($comments as $comment): $id=$_GET['id'] ?>
            <?php if($comment['video_id'] == $id): ?>
         <div class="ms-5 mb-2 text-white">
            <div class="d-flex justify-content-between">   
                <h5 class="text-secondary m-0">@ <?=$comment['user_name'] ?></h5>
                <p class="text-secondary m-0">@ <?=$comment['created_at'] ?></p>
             </div>
          <p class=" "><?=$comment['text'] ?></p>
        </div>
        <?php endif ?>
        <?php endforeach ?>    
    </div>
 </div>

 <!-- Display videos in the sidebar -->
 
        <div class="col-3">
       <?php foreach($videos as $video): ?>
            
        <div class="d-flex m-3  rounded bg-secondary bg-opacity-25 ">
            <a href="?page=video&id=<?=$video['vid_id']?>" ><img style="height:120px;width: 170px;" class="p-3" src="<?=$video['thumbnail_url']?>"/></a>
           <div class="">
           <p class="pt-3 mb-0 text-white"><?=$video['video_name']?></p>
           <div class="">
            <p class="m-0 text-white opacity-75"><?=$video['user_name']?></p>
            <p style="font-size: 10px;" class="m-0 text-white opacity-75"><?=$video['created_at']?></p>
            </div>
           </div>
        </div>
       
        <?php endforeach ?>
    </div>
    </div>
</body>
</html>