<?php
session_start();
if(!isset($_GET['id']))
{
    header('Location: index.php');
}
include 'database.php';
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

if(isset($_SESSION['id_user'])&&($_SESSION['id_user']!=$_GET['id']))
{
    $query = "SELECT * FROM subscriptions WHERE id_user_from=? AND id_user_to=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['id_user'], $_GET['id']]);

    
    $count = $stmt->rowCount();}?>
<div class="container-fluid">
    <div class="row">
        <div class="img">
            <div class="img-image">
                <img src="images/channel-banner.png" alt="" class="c-banner">
            </div>
            <div class="c-avatar">
                <a href="#"><img src="images/channel-user.png" alt=""></a>
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
                                    <div class="c-checkbox">
                                        <img src="images/verified-profile-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="c-nav">
                                    <ul class="list-inline">
                                        <li><a href="#">Videos</a></li>
                                        <li><a href="#">Playlist</a></li>
                                        <li class="hidden-xs"><a href="#">Channels</a></li>
                                        <li class="hidden-xs"><a href="#">Discussion</a></li>
                                        <li class="hidden-xs"><a href="#">About</a></li>
                                        <li class="hidden-xs"><a href="#">Donate</a></li>
                                    </ul>
                                    <div class="btn-group dropup pull-right">
                                        <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Discussion <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="c-sub pull-right hidden-xs">
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
                                            <?php echo $subscribers; ?>
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
                        <div class="row">
                            <div class="col-lg-8 col-xs-6">
                                <div class="btn-group bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Uploads <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-4 col-xs-6">
                                <div class="h-grid pull-right hidden-xs">
                                    <a href="#"><i class="cv cvicon-cv-grid-view"></i></a>
                                    <a href="#"><i class="cv cvicon-cv-list-view"></i></a>
                                </div>
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Date Added ( Newest ) <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
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
                <!-- /Featured Videos -->

                <!-- pagination -->
                <div class="v-pagination">
                    <ul class="list-inline">
                        <li class="v-pagination-prev"><a href="#"><i class="cv cvicon-cv-previous"></i></a></li>
                        <li class="v-pagination-first"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">10</a></li>
                        <li class="v-pagination-skin visible-xs"><a href="#">Skip 5 Pages</a></li>
                        <li class="v-pagination-next"><a href="#"><i class="cv cvicon-cv-next"></i></a></li>
                    </ul>
                </div>
                <!-- /pagination -->

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>