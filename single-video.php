<?php
session_start();
include "database.php";
include "header.php"; 
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
   /* $likequery = "SELECT * FROM video_likes WHERE id_video = ? AND like=1";
    $stmt = $pdo->prepare($likequery);
    $stmt->execute([$id]);
    $likes = $stmt->rowCount();
    $likes = $stmt->fetchAll();
    $dislikequery = "SELECT * FROM video_likes WHERE id_video = ? AND dislike=1";
    $stmt = $pdo->prepare($dislikequery);
    $stmt->execute([$id]);
    $dislikes = $stmt->rowCount();
    $dislikes = $stmt->fetchAll();*/
 }
 else
 {
    header("Location: index.php");
 }
?>

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
                <button class="btn" onclick="window.location.href='video-rate.php?id=1&vidid=<?php echo $id; ?>'" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
  <button class="btn" onclick="window.location.href='video-rate.php?id=0&vidid=<?php echo $id; ?>'" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>
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
                        <div class="sv-views-count">
                            2,729,347 views
                        </div>
                        <div class="sv-views-progress">
                            <div class="sv-views-progress-bar"></div>
                        </div>
                        <div class="sv-views-stats">
                            <span class="percent">95%</span>
                            <span class="green"><span class="circle"></span> 39,852</span>
                            <span class="grey"><span class="circle"></span> 852</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="info">
                    <div class="info-content">
                        <h4>Cast:</h4>
                        <p>Nathan Drake , Victor Sullivan , Sam Drake , Elena Fisher</p>

                        <h4>Category :</h4>
                        <p>Gaming , PS4 Exclusive , Gameplay , 1080p</p>

                        <h4>About :</h4>
                        <p>Three years after the events of Uncharted 3: Drake's Deception, Nathan Drake, now retired as a fortune hunter, has settled into a normal life with his wife Elena Fisher. His world is then turned upside down when his older brother Sam, long believed to be dead, suddenly reappears seeking Drake's help.</p>

                        <h4>Tags :</h4>
                        <p class="sv-tags">
                            <span><a href="#">Uncharted 4</a></span>
                            <span><a href="#">Playstation 4</a></span>
                            <span><a href="#">Gameplay</a></span>
                            <span><a href="#">1080P</a></span>
                            <span><a href="#">ps4Share</a></span>
                            <span><a href="#">+ 6</a></span>
                        </p>

                        <div class="row date-lic">
                            <div class="col-xs-6">
                                <h4>Release Date:</h4>
                                <p>2 Days ago</p>
                            </div>
                            <div class="col-xs-6 ta-r">
                                <h4>License:</h4>
                                <p>Standard</p>
                            </div>
                        </div>
                    </div>

                    <div class="showless hidden-xs">
                        <a href="#">Show Less</a>
                    </div>

                    <div class="content-block head-div head-arrow head-arrow-top visible-xs">
                        <div class="head-arrow-icon">
                            <i class="cv cvicon-cv-next"></i>
                        </div>
                    </div>

                    <div class="adblock2">
                        <div class="img">
                            <span class="hidden-xs">
                                Google AdSense<br>728 x 90
                            </span>
                            <span class="visible-xs">
                                Google AdSense 320 x 50
                            </span>
                        </div>
                    </div>

                    <!-- similar videos -->
                    <div class="caption hidden-xs">
                        <div class="left">
                            <a href="#">Similar Videos</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
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
                        <div class="similar-v single-video video-mobile-02">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="h-video row">
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-img">
                                                <a href="single-video-tabs.html"><img src="images/sv-12.png" alt=""></a>
                                                <div class="time">7:18</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-desc">
                                                <a href="single-video-tabs.html">3DS Games Of 2016 that blew our mind</a>
                                            </div>
                                            <div class="v-views">
                                                630,347 views
                                            </div>
                                            <div class="v-percent"><span class="v-circle"></span> 83%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="h-video row">
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-img">
                                                <a href="single-video-tabs.html"><img src="images/sv-13.png" alt=""></a>
                                                <div class="time">23:18</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-desc">
                                                <a href="single-video-tabs.html">Cornfield Chase Outlast II Official Gameplay</a>
                                            </div>
                                            <div class="v-views">
                                                2,630,347 views
                                            </div>
                                            <div class="v-percent"><span class="v-circle"></span> 96%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="h-video row">
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-img">
                                                <a href="single-video-tabs.html"><img src="images/sv-14.png" alt=""></a>
                                                <div class="time">15:36</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-desc">
                                                <a href="single-video-tabs.html">No Man's Sky: 21 Minutes of Gameplay</a>
                                            </div>
                                            <div class="v-views">
                                                71,347 views
                                            </div>
                                            <div class="v-percent"><span class="v-circle"></span> 63%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="h-video row">
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-img">
                                                <a href="single-video-tabs.html"><img src="images/sv-7.png" alt=""></a>
                                                <div class="time">27:18</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-desc">
                                                <a href="single-video-tabs.html">No Man's Sky: 21 Minutes of Gameplay</a>
                                            </div>
                                            <div class="v-views">
                                                10,347 views
                                            </div>
                                            <div class="v-percent"><span class="v-circle"></span> 43%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        echo "<div class='cl-comment'>
                                    <div class='cl-avatar'><a href='#'><img src='images/ava8.png' alt=''></a></div>
                                    <div class='cl-comment-text'>
                                        <div class='cl-name-date'><a href='#'>".$user['username']."</a> . 1 week ago</div>
                                        <div class='cl-text'>".$comment['content']."</div>
                                        <div class='cl-meta'><span class='green'><span class='circle'></span> 121</span> <span class='grey'><span class='circle'></span> 2</span> . <a href='#'>Reply</a></div>
                                        
                                        <div class='cl-flag'><a href='#'><i class='cv cvicon-cv-flag'></i></a></div>
                                    </div>
                                    <div class='clearfix'></div>
                                </div>";
    }
?>


                                <!-- reply comment -->
                                <div class="cl-comment-reply">
                                    <div class="cl-avatar"><a href="#"><img src="images/ava7.png" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#">kingPIN</a> . 6 days ago</div>
                                        <div class="cl-text"> I was stuck too. then I started to shoot everything in Doom.</div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 70</span> <span class="grey"><span class="circle"></span> 9</span> . <a href="#">Reply</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- END reply comment -->

                               
                            </div>
                        </div>
                        <!-- END comments -->
                    </div>
                </div>
                
            </div>

            <!-- right column -->
            <div class="col-lg-4 col-xs-12 col-sm-12 hidden-xs">

                <!-- up next -->
                <div class="caption">
                    <div class="left">
                        <a href="#">Up Next</a>
                    </div>
                    <div class="right">
                        <a href="#">Autoplay <i class="cv cvicon-cv-btn-off"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="list">
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-1.png" alt=""></a>
                                <div class="time">15:19</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Battlefield 3: Official Fault Line Gameplay</a>
                            </div>
                            <div class="v-views">
                                2,729,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 55%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-2.png" alt=""></a>
                                <div class="time">4:23</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Kingdom Come: Deliverance ALPHA</a>
                            </div>
                            <div class="v-views">
                                429,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 79%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-3.png" alt=""></a>
                                <div class="time">7:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Markiplier Reacts to Mean Comments</a>
                            </div>
                            <div class="v-views">
                                630,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 83%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-4.png" alt=""></a>
                                <div class="time">15:19</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Cornfield Chase Outlast II Official Gameplay</a>
                            </div>
                            <div class="v-views">
                                2,729,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 55%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-5.png" alt=""></a>
                                <div class="time">4:23</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Amazing Facts About Nebulas ...</a>
                            </div>
                            <div class="v-views">
                                429,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 79%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-6.png" alt=""></a>
                                <div class="time">7:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">3DS Games Of 2016 that blew our mind</a>
                            </div>
                            <div class="v-views">
                                630,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 83%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-7.png" alt=""></a>
                                <div class="time">27:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">No Man's Sky: 21 Minutes of Gameplay</a>
                            </div>
                            <div class="v-views">
                                10,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 43%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-8.png" alt=""></a>
                                <div class="time">5:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">There Can Only Be One! Introducing Tanc ...</a>
                            </div>
                            <div class="v-views">
                                453,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 79%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-9.png" alt=""></a>
                                <div class="time">34:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Game of Thrones Season 6: Event Promo</a>
                            </div>
                            <div class="v-views">
                                1,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 93%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-10.png" alt=""></a>
                                <div class="time">6:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Mirror's Edge Catalyst Beta: PS4 vs Xbox One</a>
                            </div>
                            <div class="v-views">
                                420,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 73%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-11.png" alt=""></a>
                                <div class="time">21:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Cornfield Chase Outlast II Official Gameplay</a>
                            </div>
                            <div class="v-views">
                                50,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 94%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-12.png" alt=""></a>
                                <div class="time">7:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">3DS Games Of 2016 that blew our mind</a>
                            </div>
                            <div class="v-views">
                                630,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 83%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-13.png" alt=""></a>
                                <div class="time">23:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Cornfield Chase Outlast II Official Gameplay</a>
                            </div>
                            <div class="v-views">
                                2,630,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 96%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="images/sv-14.png" alt=""></a>
                                <div class="time">15:36</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">No Man's Sky: 21 Minutes of Gameplay</a>
                            </div>
                            <div class="v-views">
                                71,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 63%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- END Recomended Videos -->

                <!-- load more -->
                <div class="loadmore">
                    <a href="#">Show more videos</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
