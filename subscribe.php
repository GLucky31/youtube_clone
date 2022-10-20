<?php session_start();
include "database.php";

if(isset($_SESSION['id_user']))
{
    $query = "INSERT INTO subscriptions(id_user_to,id_user_from) VALUES(?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['id'],$_SESSION['id_user']]);
    if(isset($_GET['vid']))
    {
        header('location: single_video.php?id='.$_GET['vid']);
    }
    else{
    header('location: channel.php?id='.$_GET['id']);}
}
else{
    header("location:login.php");
}