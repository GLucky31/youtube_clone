<?php session_start() ;
include 'database.php' ;
if(!isset($_SESSION['id_user'])||!isset($_POST['submit']))
{
    header("location:login.php");
}
else{
    $id=$_SESSION['id_user'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $pass1=$_POST['pass1'];
    $pass2=$_POST["pass2"];
    $dir="images/icons/".$_FILES['profile_picture']['name'];
    $mime=$_FILES['profile_picture']['type'];
    if($pass1===$pass2&&(!(empty($pass1))||!(empty($pass2)))){
        $pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT) ;
        $query= "UPDATE users SET pass=? WHERE id_user=? ";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$pass,$id]);
}
if(!(empty($email))){
    $query= "UPDATE users SET email=? WHERE id_user=? ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email,$id]);
}
if(!(empty($username))){
    $query= "UPDATE users SET username=? WHERE id_user=? ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username,$id]);
    $_SESSION['username']=$username;
}
if(!empty($_FILE['profile_picture'])&&($mime=="png"||$mime=="jpg"||$mime=="jpeg")){
    if(move_uploaded_file($_FILES['profile_picture']['tmp_name'],$dir))
    {
        $query= "UPDATE users SET image=? WHERE id_user=? ";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_FILES['profile_picture']['name'],$id]);
        $_SESSION['profile_picture']=$_FILES['profile_picture']['name'];
    }
}
if(!empty($_POST['about']))
{
    $about=$_POST['about'];
    $query= "UPDATE users SET about=? WHERE id_user=? ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$about,$id]);
    $_SESSION['about']=$about;
}

header("location:user-options.php");
}
?>