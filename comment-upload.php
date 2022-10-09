<?php session_start();
include 'database.php';
if(!isset($_SESSION['id_user']))
{
    header("location:login.php");
}
else{
    $msg=$_POST['msg'];
    $id=$_SESSION['id_user'];
    $vidid=$_POST['video_id'];
    echo $msg;
    echo $id;
    echo $vidid;
   $query = "INSERT INTO comments(content,id_user,id_video) VALUES(?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$msg,$id,$vidid]);
    header("location:single-video.php?id=$_POST[video_id]");
}
?>