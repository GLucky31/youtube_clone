<?php
include_once './database.php';

$username = $_POST['username'];
$email = $_POST['email'];



$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
//preverim podatke, da so obvezi vnešeni
if (!empty($username) 
        && !empty($email)  && !empty($pass1)
        && ($pass1 == $pass2)) {
    
    //$pass = sha1($pass1.$salt);
    $pass = password_hash($pass1, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO users (username,email,"
            . "pass) "
            . "VALUES (?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username,$email,$pass]);
    
    header("Location: login.php");
}
else {
    header("Location: registration.php");
}
?>