<?php session_start();
include 'database.php';
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
}
else{
    $id = $_SESSION['id_user'];
    $rating = $_GET['id'];
    $comid = $_GET['comid'];
    $query1 = 'SELECT * FROM comment_likes WHERE id_user = ? AND id_comment = ?';
    $stmt1 = $pdo->prepare($query1);
    $stmt1->execute([$id, $comid]);
    $count = $stmt1->rowCount();
    $like = $stmt1->fetch();
            
    if ($count == 0) {
        switch ($rating) {

            case 1:
            $query2 = 'INSERT INTO comment_likes(id_comment, id_user, likes, dislikes) VALUES(?,?,?,?);';
            $stmt2 = $pdo->prepare($query2);
            $stmt2->execute([$comid, $id,1,0]);
                break;
    
            case 0:
                $query2 = 'INSERT INTO comment_likes(id_comment, id_user, likes, dislikes) VALUES(?,?,?,?)';
            $stmt2 = $pdo->prepare($query2);
            $stmt2->execute([$comid, $id,0,1]);
                break;
            }
    }
    elseif($count==1){
        if($like['likes']==0 && $like['dislikes']==1) {
            switch ($rating) {
                case 1:
                $query2 = 'UPDATE comment_likes SET likes = 1, dislikes = 0 WHERE id_user = ? AND id_comment = ? ;';
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute([$id, $comid]);
                    break;
        
                case 0:
                $query2 ='DELETE FROM comment_likes WHERE id_user = ? AND id_comment = ? ;';
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute([$id, $comid]);
                    break;
            }
        }
        elseif($like['likes']==1 && $like['dislikes']==0){
            switch ($rating) {
                case 1:
                $query2 = 'DELETE FROM comment_likes WHERE id_user = ? AND id_comment = ? ;';
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute([$id, $comid]);
                    break;
        
                case 0:
                $query2 = 'UPDATE comment_likes SET likes = 0, dislikes = 1 WHERE id_user = ? AND id_comment = ? ;';
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute([$id, $comid]);
                    break;
            }
        }
    }
    header("location:single-video.php?id=".$_GET['vidid']);
}



    
?>