<?php

session_start();
include 'database.php';
if(!isset($_SESSION['id_user']))
{
    header("location:login.php");
}
include "header.php"; ?>
<!-- bootstrap menu  of links that links to user option, user videos, subscriptions, and logout -->
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <h1>My account</h1>
            
               
                    <a href="user-options.php">User options</a>
                   
               
                    <a    href="user-videos.php">My videos</a>
                   
              
                    <a    href="subscriptions.php">Subscriptions</a>
                   
              
                    <a    href="logout.php">Logout</a>
                   
           
        </div>
    </div>
<?php include "footer.php"; ?>

