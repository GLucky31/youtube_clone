<?php
session_start();

if(!isset($_GET['id']))
{
    header('Location: index.php');
}
include 'database.php';
$query = "SELECT * FROM users WHERE id_user=".$_GET['id'];
$stmt = $pdo->query($query);
$count = $stmt->rowCount();
if($count == 0)
{
    header('Location: index.php');
}
include_once 'header.php'; 
if(isset($_GET['id']))
{
}?>
<!-- channel -->
<?php 

 $query = "SELECT * FROM subscriptions WHERE id_user_to=?";
 $stmt = $pdo->prepare($query);
 $stmt->execute([ $_GET['id']]);
$subscribers = $stmt -> rowCount();
$query = "SELECT * FROM users WHERE id_user=?";
$stmt = $pdo -> prepare($query);
$stmt->execute([$_GET['id']]);
$user=$stmt->fetch();
$username=$user['username'];
$query = 'SELECT * FROM videos WHERE id_user = ?';
$stmt = $pdo->prepare($query);
$stmt->execute([$_GET['id']]);
$videos = $stmt->fetchAll();
$about = $user['about'];
$image=$user['image'];
if(isset($_SESSION['id_user'])&&($_SESSION['id_user']!=$_GET['id']))
{
    $query = "SELECT * FROM subscriptions WHERE id_user_from=? AND id_user_to=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['id_user'], $_GET['id']]);

    
    $count = $stmt->rowCount();}?>
<div class="channel dark">
<div class="container-fluid">
    <div class="row">
        <div class="img">
            <div class="img-image">
                <img src="images/channel-banner.png" alt="" class="c-banner">
            </div>
            <div class="c-avatar">
            <?php if(!isset($user['image']))
            {
                                echo "<img src='images/avatar.png' alt='avatar' />";
                            }
                            else{
                                $image=$user['image'];
                                echo "<img src='images/icons/".$image."' alt='avatar' />";
                            } ?>
            </div>
            
        </div>
    </div>
</div>
<!-- ///channel -->


<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="channel-details">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-2 col-xs-12">
                            <div class="c-details">
                                <div class="c-name">
                                    <?php echo $username; ?>    
                                  
                                </div>
                                <div class="c-nav">
                                    <ul class="list-inline">
                                        <li><a href="channel.php?id=<?php echo $_GET['id']?>">Videos</a></li>
                                        
                                        <li class="hidden-xs"><a href="channel.php?id=<?php echo $_GET['id']?>&about=1">About</a></li>
                                    </ul>
                                    
                                </div>
                                <div class=" pull-right hidden-xs">
                                    <div class="c-sub-wrap">
                                        <div class="c-f">
                                            <!-- red bootstrap button a tag with white text -->
                                            <?php if((isset($_SESSION['id_user'])&&($_SESSION['id_user']!=$_GET['id']))||(!isset($_SESSION['id_user'])))
                                            {
                                                if(((isset     ($count)&&($count==0))||(!isset($_SESSION['id_user']))))
                                                {
                                                    echo "<a href='subscribe.php?id=".$_GET['id']."' class='btn btn-danger btn-sm'>Subscribe</a>";
                                                }
                                                else
                                                {
                                                    echo "<a href='unsubscribe.php?id=".$_GET['id']."' class='btn btn-success btn-sm'>Unsubscribe</a>";
                                                }
                                                
                                            }?>

                                        </div>
                                        <div class="c-s">
                                            <?php echo "<span style='color:white;'>".$subscribers."</span>"; ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Featured Videos -->
                <div class="content-block">
                    <div class="cb-header">
                       
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                        <?php 
                        if(!isset($_GET['about']))
                        {
                        foreach($videos as $video){   
                            $views=$video['views'];
                                                            $query= "SELECT * FROM video_likes WHERE id_video = ? and likes = 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$video['id_video']]);
    $likecount= $stmt->rowCount();
                            echo "<div class=' col-lg-3 col-sm-6 videoitem'>
                                <div class='b-video'>
                                    <div class='v-img'>
                                        <a href='single-video.php?id=".$video['id_video']."'><img src='images/video1-1.png' alt=''></a>
                                    </div>
                                    <div class='v-desc'>
                                        <a href='single-video.php?id=".$video['id_video']."'>".$video['title']."</a>
                                    </div>
                                    <div class='v-views'>
                                        ".$views." views. <span class='v-percent'><span class='v-circle'></span> ".$likecount."</span>
                                    </div>
                                </div>
                            </div>";}}
?>
                           
                        </div>
                    </div>
                </div>
                <!-- /Featured Videos -->

               

            </div>
        </div>
    </div>
</div>
                        </div>
<?php include 'footer.php'; ?>