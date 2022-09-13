<?php
include_once './database.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$city_id = $_POST['city_id'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
//preverim podatke, da so obvezi vnešeni
if (!empty($first_name) && !empty($last_name)
        && !empty($email) && !empty($address)
        && !empty($city_id) && !empty($pass1)
        && ($pass1 == $pass2)) {
    
    //$pass = sha1($pass1.$salt);
    $pass = password_hash($pass1, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO users (first_name,last_name,email,phone,"
            . "address,birthday,city_id,pass) "
            . "VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$first_name,$last_name,$email,$phone,$address,$birthday,$city_id,$pass]);
    
    header("Location: login.php");
}
else {
    header("Location: registration.php");
}
?>