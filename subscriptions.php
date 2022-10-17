<?php session_start();
if(!isset($_SESSION['id_user'])){   
    header("location:login.php"); }
include "database.php";
include "header.php";
$query="SELECT * FROM subscriptions WHERE id_user_from=?";
$stmt=$pdo->prepare($query);
$stmt->execute([$_SESSION['id_user']]);
$subs=$stmt->fetchAll();
$count= $stmt->rowCount();
//div container with light gray background and centered content
echo "<div class='container-fluid'>
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <h1 class='text-center'>Subscriptions</h1>";
                foreach($subs as $sub)
{
    $query="SELECT * FROM users WHERE id_user=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$sub['id_user_to']]);
    $user=$stmt->fetch();
    echo "<a style='color:white;' href='channel.php?id=".$user['id_user']."'>".$user['username']."</a><br>";
}

echo "
            </div>
        </div>
    </div>
</div>";


?>


<?php "footer.php";?>