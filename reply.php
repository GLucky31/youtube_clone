<?php session_start();
if(!isset($_SESSION['id_user'])&&!isset($_POST['sub'])){   
    header("location:login.php"); }
include "database.php";
$username = $_SESSION['username'] ;
$vidId= $_POST['vidId'];
$id_comment = $_GET['com'];
$replyContent=$_POST['reply'];
$query = "SELECT * FROM users WHERE username=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$username]);
$user = $stmt->fetch();
$id_user=$user['id_user'];
if(!empty($replyContent)){
    $query = "INSERT INTO comments(content, id_user, id_video,FK_id_comment)
        VALUES (?, ?, ?,?)";
    $stmt = $pdo->prepare($query);
    if(isset($_POST['posterId'])){
        $posterId = $_POST['posterId'];
        $query4="SELECT * FROM users WHERE id_user=?";
        $stmt4=$pdo->prepare($query4);
        $stmt4->execute([$posterId]);
        $user4=$stmt4->fetch();
        $name=$user4['username'];
        $replyContent="@".$name." ".$replyContent;
    }
    $stmt->execute([$replyContent, $id_user ,$vidId,$id_comment]);
    header("location:single-video.php?id=".$vidId);
}