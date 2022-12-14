<?php session_start();
include 'database.php';
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
}
else{
    $id = $_SESSION['id_user'];
    $rating = $_GET['id'];
    $vidid = $_GET['vidid'];
    $query1 = 'SELECT * FROM video_likes WHERE id_user = ? AND id_video = ?';
    $stmt1 = $pdo->prepare($query1);
    $stmt1->execute([$id, $vidid]);
    $count = $stmt1->rowCount();
    $like = $stmt1->fetch();
            
    if ($count == 0) {
        switch ($rating) {

            case 1:
            $query2 = 'INSERT INTO video_likes(id_video, id_user, likes, dislikes) VALUES(?,?,?,?);';
            $stmt2 = $pdo->prepare($query2);
            $stmt2->execute([$vidid, $id,1,0]);
                break;
    
            case 0:
                $query2 = 'INSERT INTO video_likes(id_video, id_user, likes, dislikes) VALUES(?,?,?,?)';
            $stmt2 = $pdo->prepare($query2);
            $stmt2->execute([$vidid, $id,0,1]);
                break;
            }
    }
    elseif($count==1){
        if($like['likes']==0 && $like['dislikes']==1) {
            switch ($rating) {
                case 1:
                $query2 = 'UPDATE video_likes SET likes = 1, dislikes = 0 WHERE id_user = ? AND id_video = ? ;';
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute([$id, $vidid]);
                    break;
        
                case 0:
                $query2 ='DELETE FROM video_likes WHERE id_user = ? AND id_video = ? ;';
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute([$id, $vidid]);
                    break;
            }
        }
        elseif($like['likes']==1 && $like['dislikes']==0){
            switch ($rating) {
                case 1:
                $query2 = 'DELETE FROM video_likes WHERE id_user = ? AND id_video = ? ;';
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute([$id, $vidid]);
                    break;
        
                case 0:
                $query2 = 'UPDATE video_likes SET likes = 0, dislikes = 1 WHERE id_user = ? AND id_video = ? ;';
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute([$id, $vidid]);
                    break;
            }
        }
    }
    header("location:single-video.php?id=".$_GET['vidid']);
}



    
?>