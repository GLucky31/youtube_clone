<?php session_start() ;
include 'database.php' ;
if(!isset($_SESSION['id_user']))
{
    header("location:login.php");
}
$username = $_POST['username'];
$email=$_POST['email'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
if(isset($_POST['submit'])){
    /*if($pass1==$pass2 && $pass1!="" && $pass2!=""){
        $query = "UPDATE users SET pass=? WHERE id_user=?";
        $stmt = $pdo->prepare($query);
        $pass = password_hash($pass1, PASSWORD_DEFAULT);    
        $stmt->execute([$pass, $id]);
    }*/
    if(!empty($username) && $username!=$usernamesess){
        $query = "UPDATE users SET username=? WHERE id_user=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $id]);
    }
    if(!empty($email) && $email!=$emailsess&& $emailcount==0){
        $query = "UPDATE users SET email=? WHERE id_user=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email, $id]);
    }
    header("location:user-options.php");
}
?>