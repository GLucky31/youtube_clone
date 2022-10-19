<?php
session_start();
include 'database.php';
include "header.php";
if(!isset($_GET['id']))
{
    header("location: index.php");
}
?>
<div class="dark">
<div class="content-wrapper head-div">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- Featured Videos -->
                <div class="content-block">
                <div class="single-video video-mobile-02">
                        <div class="row">
                        <?php
                        
                        $query ="SELECT * FROM videos WHERE UPPER(title) LIKE CONCAT('%', ?, '%')";
                        $stmt=$pdo->prepare($query);
                        $stmt->execute([$_GET['id']]);
                        $videos=$stmt->fetchAll();
                        foreach($videos as $video){
                            echo "<div class='col-lg-3 col-sm-6 col-xs-12'>
                            <div class='h-video row'>
                                <div class='col-sm-12 col-xs-6'>
                                    <div class='v-img'>
                                        <a href='single-video.php?id=".$video['id_video']."'><img src='images/sv-4.png' alt=''></a>                                    </div>
                                </div>
                                <div class='col-sm-12 col-xs-6'>
                                    <div class='v-desc'>
                                        <a href='single-video.php?id=".$video['id_video']."'>".$video['title']."</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                        
                        ?>
                        
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include "footer.php";?>