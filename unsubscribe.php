<?php session_start();
include "database.php";

$query = "SELECT * FROM subscriptions WHERE id_user_to=".$_GET['id']." AND id_user_from=".$_SESSION['id_user'];
$stmt = $pdo->query($query);
if($stmt->rowCount() > 0)
    {
    $query = "DELETE FROM subscriptions WHERE id_user_to=? AND id_user_from=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['id'],$_SESSION['id_user']]);

        header('location: channel.php?id='.$_GET['id']);
    }
else{
        header("location:login.php");}