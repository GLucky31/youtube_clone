<?php
session_start();
include 'database.php';
if(isset($_SESSION['user_id']))
{
    $query = "DELETE FROM videos WHERE id_video=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['id']]);
    header('location: index.php');
}
else{
    header("location:login.php");
}