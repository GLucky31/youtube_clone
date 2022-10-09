<?php session_start();
insert "database.php";
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
}
else{
    $id = $_SESSION['id_user'];
    $rating = $_GET['id'];
    $vidid = $_GET['vidid'];
    $query1 = 'SELECT * FROM video_likes WHERE id_user = ? AND video_id = ?';
    $stmt1 = $pdo->prepare($query1);
    $stmt1->execute([$id, $vidid]);
    $count = $stmt1->rowCount();
    $likes = $stmt1->fetch();
    if($count > 0 && $likes['rating'] != $rating){
    header("location:user-options.php");
}