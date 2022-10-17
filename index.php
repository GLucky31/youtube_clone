
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
                                <?php if(isset($_SESSION['id_user'])){
                                    echo "<div class='cb-header'>
                                    <div class='row'>
                                        <div class='col-lg-10 col-sm-10 col-xs-8'>
                                            <h3>Subscribed channel videos</h3>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class='cb-content videolist'>
                                    <div class='row'>";
                                       
                                                     
                                                        $query="SELECT * FROM subscriptions WHERE id_user_from = ?";
                                                        $stmt = $pdo->prepare($query);
                                                        $stmt->execute([$_SESSION['id_user']]);
                                                        $subs = $stmt->fetchAll();
                                                        $count = $stmt->rowCount();
                                                        if($count==0){
                                                            echo "<div style='color:white;'><h4>You are not subscribed to any channel</h3></div>";
                                                        }
                                                        else{
                                                            
                                                        $query2="SELECT * FROM videos WHERE";
                                                        foreach($subs as $sub){
                                                            $query2.=" id_user =".$sub['id_user_to']." OR";
                                                        }
                                                        $query2 = substr($query2, 0, -3);
                                                        $stmt = $pdo->prepare($query2);
                                                        $stmt->execute();
                                                        $videosf = $stmt->fetchAll();
                                                        $counted= $stmt->rowCount();
                                                        if($counted==0){
                                                            echo "<h4 style='color:white;'>There are no videos from your subscribed channels</h3>";
                                                        }
                                                        else{
                                                        foreach($videosf as $video){   
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
                                            </div>";}}
                }
                                     
                                    echo "</div>
                                </div>";}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include "footer.php";?>