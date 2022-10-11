<?php
session_start();
if(!isset($_SESSION['id_user'])){
  header("location:login.php");
}
include "database.php";
include "header.php";

//pdo get videos by id of session user
$query = 'SELECT * FROM videos WHERE id_user = ?';
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['id_user']]);
$videos = $stmt->fetchAll();
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
<div class="cb-content videolist">
    <div class="row pad-top">
        <?php
        foreach($videos as $video){
            $getID3 = new getID3;
$file = $getID3->analyze("videos/".$video['video']);
echo "<div class=' col-lg-3 col-sm-6 videoitem'>
                                <div class='b-video'>
                                    <div class='v-img'>
                                        <a href='single-video.php?id=".$video['id_video']."'><img src='images/video1-1.png' alt=''></a>
                                        <div class='time'>".$file['playtime_seconds']."</div>
                                    </div>
                                    <div class='v-desc'>
                                        <a href='single-video.php?id=".$video['id_video']."'>".$video['title']."</a>
                                    </div>
                                    <div class='v-views'>
                                        27,548 views. <span class='v-percent'><span class='v-circle'></span> 78%</span>
                                    </div>
                                </div>
                            </div>";
    
                            
                            // dropdown menu under button with ... for video with options edit and delete
                            echo "<div class='dropdown'>
                            <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                              ...
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                              <a class='dropdown-item' href='upload-edit.php?id=".$video['id_video']."'>Edit</a>
                              <a class='dropdown-item' href='video-delete.php?id=".$video['id_video']."'>Delete</a>
                            </div>
                            </div>";
        
                            }?>

                            
    </div>
                    
</div>
</div>
</div>
</div>
</div>
<?php include "footer.php"; ?>