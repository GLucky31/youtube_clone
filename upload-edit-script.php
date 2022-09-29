<?php session_start();
include 'database.php';
if(!isset($_POST['submit']))
{
    header("location:index.php");
}
else{
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $query = "UPDATE videos SET title=?,description=? WHERE id_video=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$description,$id]);
    header("location:upload-edit.php?id=$id");
}
?>
