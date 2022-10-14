
<?php 
session_start();
include "database.php";
include "header.php";
$query = 'SELECT * FROM videos';
$stmt = $pdo->query($query);
$videos = $stmt->fetchAll();

if(isset($_SESSION['ADMIN'])){
echo "<br>".$_SESSION['admin'];}?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="content-block head-div">
                                <div class="cb-header">
                                    <div class="row">
                                        <div class="col-lg-10 col-sm-10 col-xs-8">
                                            <h3>Newest videos</h3>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="cb-content videolist">
                                    <div class="row">
                                       
                                                        <?php foreach($videos as $video){   
                                            echo "<div class=' col-lg-3 col-sm-6 videoitem'>
                                                <div class='b-video'>
                                                    <div class='v-img'>
                                                        <a href='single-video.php?id=".$video['id_video']."'><img src='images/video1-1.png' alt=''></a>
                                                        <div class='time'>3:50</div>
                                                    </div>
                                                    <div class='v-desc'>
                                                        <a href='single-video.php?id=".$video['id_video']."'>".$video['title']."</a>
                                                    </div>
                                                    <div class='v-views'>
                                                        27,548 views. <span class='v-percent'><span class='v-circle'></span> 78%</span>
                                                    </div>
                                                </div>
                                            </div>";}
                ?>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include "footer.php";?>