<?php
include 'database.php';
session_start();
if(isset($_POST['submit']))
{
    $dir="videos/".$_FILES['file']['name'];
$mime=$_FILES['file']['type'];
//make if statement that checks if mime type is video or not
if($mime=="video/mp4" || $mime=="video/avi" || $mime=="video/mkv" || $mime=="video/mov" || $mime=="video/flv" || $mime=="video/wmv" || $mime=="video/3gp" || $mime=="video/webm" || $mime=="video/ogg" || $mime=="video/ogv" || $mime=="video/ogx" || $mime=="video/ogm" )
{
    if(move_uploaded_file($_FILES['file']['tmp_name'],$dir))
    {
        echo "file uploaded";
        $query = "INSERT INTO videos(video,title,id_user) VALUES(?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_FILES['file']['name'],$_FILES['file']['name'],$_SESSION['id_user']]);
        $idget="SELECT * FROM videos WHERE video=?";
        $stmt = $pdo->prepare($idget);
        $stmt->execute([$_FILES['file']['name']]);
        $video = $stmt->fetch();
        $id=$video['id_video'];
        header("Location:upload-edit.php?id=$id");
    }
    else
    {
        echo "file not uploaded";
    }
}
else
{
    echo "file is not a video";
}
}
else{
    echo "error";
header("Location:upload.php");

}


?>