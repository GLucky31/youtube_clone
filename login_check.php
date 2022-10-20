
<?php
session_start();
require_once 'database.php';
$email = $_POST['email'];
$password = $_POST['pass'];

    $query = "SELECT * FROM users WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);

    
    $count = $stmt->rowCount();
    
    if ($count == 1) {
        $user = $stmt->fetch();
        if (password_verify($password, $user['pass'])) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['username']=$user['username'];
            $_SESSION['about']=$user['about'];
            header("Location: index.php");
            die();
        }
        else{
            header('Location: login.php?error=1');
        }
}
else{
header("Location: login.php?error=1");}
?>