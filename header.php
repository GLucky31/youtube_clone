<?php include_once "getid3/getid3.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title>Circle Video</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="js/vendor/rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="js/vendor/rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <!-- player -->
    <link rel="stylesheet" href="js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelementplayer.min.css" />

    <!-- Theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/form-awesome.css" rel="stylesheet">
    <link href="css/font-circle-video.css" rel="stylesheet">

    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="dark">
<!-- logo, menu, search, avatar -->

<div class="container-fluid">
    <div class="row">
        <div class="btn-color-toggle">
            <img src="images/icon_bulb_light.png" alt="">
        </div>
        <div class="navbar-container">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3 visible-xs">
                        <a href="#" class="btn-menu-toggle"><i class="cv cvicon-cv-menu"></i></a>
                    </div>
                    <div class="col-lg-1 col-sm-2 col-xs-6">
                        <a class="navbar-brand" href="index.php">
                            <img src="images/logo.svg" alt="Project name" class="logo" />
                            <span>Circle</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-10 hidden-xs">
                        <ul class="list-inline menu">
                            <li class="color-active">
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="index.php">Home Page</a></li>
                                    <li><a href="single-video.php">Single Video Page</a></li>
                                    <li><a href="single-video-youtube.php">Single Video Youtube Embedded Page</a></li>
                                    <li><a href="single-video-vimeo.php">Single Video Vimeo Embedded Page</a></li>
                                    <li><a href="upload.php">Upload Video Page</a></li>
                                    <li><a href="upload-edit.php">Upload Video Edit Page</a></li>
                                    <li><a href="search.php">Searched Videos Page</a></li>
                                    <li><a href="channel.php">Single Channel Page</a></li>
                                    <li><a href="channels.php">Channels Page</a></li>
                                    <li><a href="single-video-tabs.php">Single Videos Page With Tabs</a></li>
                                    <li><a href="single-video-playlist.php">Single Videos Page With Playlist</a></li>
                                    <li><a href="history.php">History Page</a></li>
                          
                                    <li><a href="subscription.php">Subscription Page</a></li>
                                    <li><a href="login.php">Login Page</a></li>
                                    <li><a href="registration.php">Signup Page</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="channel.php">Channels</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-sm-8 col-xs-3">
                        <form action="search.php" method="post">
                            <div class="topsearch">
                                <i class="cv cvicon-cv-cancel topsearch-close"></i>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search" aria-describedby="sizing-addon2">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="cv cvicon-cv-video-file"></i>&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>/
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                        </ul>
                                    </div><!-- /btn-group -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-sm-4 hidden-xs">
                        <div class="avatar pull-left">
                            <img src="images/avatar.png" alt="avatar" />
                            <span class="status"></span>
                        </div>
                        <div class="selectuser pull-left">
                            <div class="btn-group pull-right dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <?php
                                    if(isset($_SESSION['id_user']))
                                    {
                                        echo $_SESSION['username'];
                                    }
                                    else
                                    {
                                        echo "User";
                                    }
                                    ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php if(isset($_SESSION['id_user']))
                                    {
                                        echo "<li><a href='user-menu.php'>Account</a></li>";
                                        echo "<li><a href='logout.php'>Logout</a></li>";
                                    }
                                    else
                                    {
                                        echo "<li><a href='login.php'>Login</a></li>
                                        <li><a href='registration.php'>Sign up</a></li>";
                                    }?>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="hidden-xs">
                    <a href="upload.php">
                        <div class="upload-button">
                            <i class="cv cvicon-cv-upload-video"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /logo -->

<div class="mobile-menu">
    <div class="mobile-menu-head">
        <a href="#" class="mobile-menu-close"></a>
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.svg" alt="Project name" class="logo" />
            <span>Circle</span>
        </a>
        <div class="mobile-menu-btn-color">
            <img src="images/icon_bulb_light.png" alt="">
        </div>
    </div>
    <div class="mobile-menu-content">
        <div class="mobile-menu-user">
            <div class="mobile-menu-user-img">
                <img src="images/ava11.png" alt="">
            </div>
            <p>Bailey Fry </p>
            <span class="caret"></span>
        </div>
        <a href="#" class="btn mobile-menu-upload">
            <i class="cv cvicon-cv-upload-video"></i>
            <span>Upload Video</span>
        </a>
        <div class="mobile-menu-list">
            <ul>
                <li>
                    <a href="#">
                        <i class="cv cvicon-cv-play-circle"></i>
                        <p>Popular Videos</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="cv cvicon-cv-playlist"></i>
                        <p>Browse Categories</p>
                        <span class="caret"></span>
                    </a>
                    <ul class="mobile-menu-categories">
                        <li class="color-active">
                            <a href="#">Pages <span class="caret"></span></a>
                            <ul>
                                <li><a href="index.php">Home Page</a></li>
                                <li><a href="single-video.php">Single Video Page</a></li>
                                <li><a href="single-video-youtube.php">Single Video Youtube Embedded Page</a></li>
                                <li><a href="single-video-vimeo.php">Single Video Vimeo Embedded Page</a></li>
                                <li><a href="upload.php">Upload Video Page</a></li>
                                <li><a href="upload-edit.php">Upload Video Edit Page</a></li>
                                <li><a href="search.php">Searched Videos Page</a></li>
                                <li><a href="channel.php">Single Channel Page</a></li>
                                <li><a href="channels.php">Channels Page</a></li>
                                <li><a href="single-video-tabs.php">Single Videos Page With Tabs</a></li>
                                <li><a href="single-video-playlist.php">Single Videos Page With Playlist</a></li>
                                <li><a href="history.php">History Page</a></li>
                          
                                <li><a href="subscription.php">Subscription Page</a></li>
                                <li><a href="login.php">Login Page</a></li>
                                <li><a href="registration.php">Signup Page</a></li>
                            </ul>
                        </li>
                
                        <li><a href="channel.php">Channels</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="cv cvicon-cv-liked"></i>
                        <p>Liked Videos</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="cv cvicon-cv-history"></i>
                        <p>History</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="cv cvicon-cv-purchased"></i>
                        <p>Purchased Videos</p>
                    </a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn mobile-menu-logout">Log out</a>
    </div>
</div>