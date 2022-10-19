<?php
session_start();
include "database.php";
include "header.php";
$query="SELECT * FROM videos WHERE id_user=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['id_user']]);
$view = $stmt->fetch();
$views= $view['views'];
$views++;
$query = "UPDATE videos SET views=? WHERE id_video=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$views,$_GET['id']]);
$query = "SELECT * FROM videos WHERE id_video=?";
$stmt = $pdo->prepare($query);
$stmt -> execute([$_GET['id']]);
$view = $stmt->fetch();
$views = $view['views'];
if(isset($_GET['id']))
 {
    $id = $_GET['id'];
    $query = "SELECT * FROM videos WHERE id_video = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $video = $stmt->fetch();
    $title = $video['title'];
    $description = $video['description'];
    $user_id=$video['id_user'];
    $query = "SELECT * FROM users WHERE id_user = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
    $username = $user['username'];
    $video_path = "videos/".$video['video'];
    if(isset($_SESSION['id_user']))
    {
    $query = "SELECT * FROM video_likes WHERE id_video = ? AND id_user = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id,$_SESSION['id_user']]);
    $rating = $stmt->fetch();
    $count= $stmt->rowCount();
    if($count==1)
    {
        if($rating['likes']==1 && $rating['dislikes']==0)
        {
            $like=1;
        }
        else
        {
            $dislike=1;
        }
    }
 }
 }
 $query= "SELECT * FROM video_likes WHERE id_video = ? and likes = 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $likecount= $stmt->rowCount();
    $query= "SELECT * FROM video_likes WHERE id_video = ? and dislikes = 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $dislikecount = $stmt->rowCount();
?>
<div class="single-video dark">
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-sm-12">
                <div class="sv-video">
                    <video poster="images/single-video.png" style="width:100%;height:100%;" controls="controls" width="100%" height="100%">
                        <source src="<?php echo $video_path; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>
                    </video>
                    
                </div>
                <h1><a href="#"><?php echo $title; ?></a></h1>
               
                <div class="acide-panel acide-panel-top">
               
                    <a href="#"><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a>
                    <a href="#"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked"></i></a>
                    <a href="#"><i class="cv cvicon-cv-flag" data-toggle="tooltip" data-placement="top" title="Flag"></i></a>
                </div>
                <div class="author">
                    <div class="author-head">
                        <a href="#"><img src="images/channel-user.png" alt="" class="sv-avatar"></a>
                        <div class="sv-name">
                            <div><a href="channel.php?id=<?php echo $user_id; ?>"><?php echo $username ?></a> . 52 Videos</div>
             
                            <div class="c-sub hidden-xs">

                                <div class="c-f">
                                    Subscribe
                                </div>
                                <div class="c-s">
                                    22,548,145
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <a href="#" class="author-btn-add"><i class="cv cvicon-cv-plus"></i></a>
                    </div>
                    <div class="author-border"></div>
                    <div class="sv-views">
                       <h3 style="color: white;"><?php echo $views;?> views</h3>
                        <button class="btn <?php if(isset($like)&&$like==1){
                 echo "btn-success";   
                }?>" onclick="window.location.href='video-rate.php?id=1&vidid=<?php echo $id; ?>'" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                <?php echo "<span style='color: white;'>".$likecount."</span>"; ?>
  <button class="btn <?php if(isset($dislike)&&$dislike==1){
                 echo "btn-danger";   
                }?>" onclick="window.location.href='video-rate.php?id=0&vidid=<?php echo $id; ?>'" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>
                 <?php echo "<span style='color: white;'>".$dislikecount."</span>"; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="info">
                    <div class="info-content">

                        <h4>About :</h4>
                        <p><?php echo $video['description']; ?></p>

                        

                      
                    </div>

                 

                    <!-- similar videos -->
                    
                    <div class="single-v-footer">
                        <div class="single-v-footer-switch">
                            <a href="#" class="active" data-toggle=".similar-v">
                                <i class="cv cvicon-cv-play-circle"></i>
                                <span>Similar Videos</span>
                            </a>
                            <a href="#" data-toggle=".comments">
                                <i class="cv cvicon-cv-comment"></i>
                                <span>236 Comments</span>
                            </a>
                        </div>
                       
                        <!-- END similar videos -->

                        <!-- comments -->
                        <div class="comments">
                            <div class="reply-comment">
                                <div class="rc-header"><i class="cv cvicon-cv-comment"></i> <span class="semibold">236</span> Comments</div>
                                <div class="rc-ava"><a href="#"><img src="images/ava5.png" alt=""></a></div>
                                <div class="rc-comment">
                                    <form action="comment-upload.php" method="post">
                                         <input type="hidden" name="video_id" value="<?php echo "$id"; ?>">
                                        <textarea name="msg" rows="3">Share what you think?</textarea >
                                        <button type="submit">
                                            <i class="cv cvicon-cv-add-comment"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="comments-list">

                                <div class="cl-header">
                                    <div class="c-nav">
                                        <ul class="list-inline">
                                            <li><a href="#" class="active">Popular <span class="hidden-xs">Comments</span></a></li>
                                            <li><a href="#">Newest <span class="hidden-xs">Comments</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- foreach loop that selects every comment with the video id with pdo and displays it -->
<?php
    $stmt = $pdo->prepare("SELECT * FROM comments WHERE id_video = ? AND FK_id_comment IS NULL");
    $stmt->execute([$id]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($comments as $comment){
        $query = "SELECT * FROM users WHERE id_user=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$comment['id_user']]);
    $user = $stmt->fetch();
    if(isset($_SESSION['id_user']))
    {
        $query= "SELECT * FROM comment_likes WHERE id_comment = ? and likes = 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$comment['id_comment']]);
    $likecomcount= $stmt->rowCount();
    $query= "SELECT * FROM comment_likes WHERE id_comment = ? and dislikes = 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$comment['id_comment']]);
    $dislikecomcount = $stmt->rowCount();
    $query = "SELECT * FROM comment_likes WHERE id_comment = ? AND id_user = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$comment['id_comment'],$_SESSION['id_user']]);
    $comrating = $stmt->fetch();
    $countcom= $stmt->rowCount();
    $comlike=0;
    $comdislike=0;
    if($countcom==1)
    {
        if($comrating['likes']==1 && $comrating['dislikes']==0)
        {
            $comlike=1;
        }
        else
        {
            $comdislike=1;
        }
    }
 }
        echo "<div class='cl-comment'>
                                    <div class='cl-avatar'><a href='#'><img src='images/ava8.png' alt=''></a></div>
                                    <div class='cl-comment-text'>
                                        <div class='cl-name-date'><a href='#'>".$user['username']."</a> </div>
                                        <div class='cl-text'>".$comment['content']."</div>
                                        <div class='cl-meta'><span class='green'><span class='circle'></span> ".$likecomcount."</span> <span class='grey'><span class='circle'></span> ".$dislikecomcount."</span> . <button id='reply".$comment['id_comment']."'>Reply</button></div>
                                        
                                        <div class='cl-flag'><a href='#'><i class='cv cvicon-cv-flag'></i></a></div>
                                    </div>
                                    <div class='clearfix'></div>
                                </div>";
                                echo "<a class='btn'";
                                if(isset($comlike)&&$comlike==1){
                                    echo "style='background-color:green'";   
                                                             }
                                echo " href='comment-rate.php?id=1&vidid=".$id."&comid=".$comment['id_comment']."'><i class='fa fa-thumbs-up fa-lg' aria-hidden='true'></i></a>";
                                echo "<a class='btn'";  
                                if(isset($comdislike)&&$comdislike==1){
                                                echo "style='background-color:red'";   
                                                }
                                echo " href='comment-rate.php?id=0&vidid=".$id."&comid=".$comment['id_comment']."'><i class='fa fa-thumbs-down fa-lg' aria-hidden='true'></i></a>";
                                echo "
                                <script>var button".$comment['id_comment']." = document.getElementById('reply".$comment['id_comment']."');

                                button".$comment['id_comment'].".onclick = function() {
                                    var div".$comment['id_comment']." = document.getElementById('replies".$comment['id_comment']."');
                                   
                                    if (div".$comment['id_comment'].".style.display !== 'none') {
                                        div".$comment['id_comment'].".style.display = 'none';
                                    }
                                    else {
                                        div".$comment['id_comment'].".style.display = 'block';
                                    }
                                };</script>
                                <div style='display: none;' id='replies".$comment['id_comment']."'>
                                <form method='post' action='reply.php?com=".$comment['id_comment']."'>
                                <input type='hidden' name='vidId' value='".$_GET['id']."'>
                                <textarea required name='reply'></textarea><input  type='submit' name='sub'></form></div>";
                                $queryreply="SELECT * FROM comments WHERE FK_id_comment=? AND id_video=?";
                                $stmt = $pdo->prepare($queryreply );
                                $stmt->execute([$comment['id_comment'],$_GET['id'] ]);
                                $replies = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach($replies as $reply)
                                {
                                    $query= "SELECT * FROM comment_likes WHERE id_comment = ? and likes = 1";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->execute([$reply['id_comment']]);
                                    $likereplycount= $stmt->rowCount();
                                    $query= "SELECT * FROM comment_likes WHERE id_comment = ? and dislikes = 1";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->execute([$reply['id_comment']]);
                                    $dislikereplycount = $stmt->rowCount();
                                    $query = "SELECT * FROM users WHERE id_user=?";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->execute([$reply['id_user']]);
                                    $user = $stmt->fetch();
                                    echo "<div class='cl-comment-reply'>
                                    <div class='cl-avatar'><a href='#'><img src='images/ava7.png' alt=''></a></div>
                                    <div class='cl-comment-text'>
                                        <div class='cl-name-date'><a href='#'>
                                        ".$user['username']."
                                         </a> </div>
                                        <div class='cl-text'>".$reply['content']."</div>
                                        <div class='cl-meta'><span class='green'><span class='circle'></span>".$likereplycount."</span> <span class='grey'><span class='circle'></span> ".$dislikereplycount."</span> . <button id='reply".$reply['id_comment']."'>Reply</button></div>
                                    </div>
                                    <div class='clearfix'></div>
                                </div>";
                                echo "
                                <script>var button".$reply['id_comment']." = document.getElementById('reply".$reply['id_comment']."');

                                button".$reply['id_comment'].".onclick = function() {
                                    var div".$reply['id_comment']." = document.getElementById('replies".$reply['id_comment']."');
                                   
                                    if (div".$reply['id_comment'].".style.display !== 'none') {
                                        div".$reply['id_comment'].".style.display = 'none';
                                    }
                                    else {
                                        div".$reply['id_comment'].".style.display = 'block';
                                    }
                                };</script>";
                                
                                echo "
                                <div style='display: none;' id='replies".$reply['id_comment']."'>
                                <form method='post' action='reply.php?com=".$comment['id_comment']."'>
                                <input type='hidden' name='vidId' value='".$reply['id_user']."'>";
                                if(isset($_SESSION['id_user']))
                                {
                                echo"
                                <input type='hidden' name='posterId' value='".$_SESSION['id_user']."'>";}
                                echo "
                                <textarea required name='reply'></textarea><input  type='submit' name='sub'></form></div>";
                                if(isset($_SESSION['id_user']))
                                {
                                $query5 = "SELECT * FROM comment_likes WHERE id_comment = ? AND id_user = ?";
                                $stmt5 = $pdo->prepare($query5);
                                $stmt5->execute([$reply['id_comment'],$_SESSION['id_user']]);
                                $countrep= $stmt5->rowCount();
                                $reprating = $stmt5->fetch();
                                
                                $replike=0;
                                $repdislike=0;
                                if($countrep==1)
                                {
                                    if($reprating['likes']==1 && $reprating['dislikes']==0)
                                    {
                                        $replike=1;
                                    }
                                    else
                                    {
                                        $repdislike=1;
                                    }
                                }
                             }
                                echo "<div class='reply-like'><div><a class='btn'";
                                if(isset($replike)&&$replike==1){
                                    echo "style='background-color:green'";   
                                                             }
                                echo " href='comment-rate.php?id=1&vidid=".$_GET['id']."&comid=".$reply['id_comment']."'><i class='fa fa-thumbs-up fa-lg' aria-hidden='true'></i></a>";
                                echo "<a class='btn'";  
                                if(isset($repdislike)&&$repdislike==1){
                                                echo "style='background-color:red'";   
                                                }
                                echo " href='comment-rate.php?id=0&vidid=".$id."&comid=".$reply['id_comment']."'><i class='fa fa-thumbs-down fa-lg' aria-hidden='true'></i></a></div></div>";
                                
                                }
    }
?>


                            
                               
                            </div>
                        </div>
                        <!-- END comments -->
                    </div>
                </div>
                
            </div>

            <!-- right column -->
            <div class="col-lg-4 col-xs-12 col-sm-12 hidden-xs">

                <!-- up next -->
                
                <div class='list'>
                <?php
                $query = "SELECT * FROM videos WHERE id_video != ? ORDER BY RAND() LIMIT 8";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$id]);
                $videos = $stmt->fetchAll();
                foreach($videos as $video)
                {
                    $views=$video['views'];
                    $query= "SELECT * FROM video_likes WHERE id_video = ? and likes = 1";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$video['id_video']]);
                    $likecount= $stmt->rowCount();
                    echo "
                    <div class='h-video row'>
                        <div class='col-lg-6 col-sm-6'>
                            <div class='v-img'>
                                <a href='single-video-tabs.html'><img src='images/sv-1.png' alt=''></a>
                                
                            </div>
                        </div>
                        <div class='col-lg-6 col-sm-6'>
                            <div class='v-desc'>
                                <a href='single-video.php?id=".$video['id_video']."'>".$video['title']."</a>
                            </div>
                            <div class='v-views'>
                                ".$likecount." views
                            </div>
                            <div class='v-percent'><span class='v-circle'></span>".$likecount."</div>
                        </div>
                        <div class='clearfix'></div>
                    </div>";
                
                }
                

?>
</div>

                <!-- END Recomended Videos -->

                <!-- load more -->
                
            </div>
        </div>
    </div>
</div>
</div>
<?php include "footer.php"; ?>
