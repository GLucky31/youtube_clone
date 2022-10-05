<?php
session_start() ;
include 'database.php' ;

if(!isset($_SESSION['id_user']))
{
    header("location:login.php");
}
else{
    $id=$_SESSION['id_user'];
    $query = "SELECT * FROM users WHERE id_user=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $user = $stmt->fetch();
    $username=$user['username'];
    $email=$user['email'];
}
    
include "header.php"; ?>


<!-- form for changing user details like username, profile picture, password -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Change your details</h1>
            <form  method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="profile_picture">Profile picture</label>
                    <input type="file" class="form-control-file" name="profile_picture" id="profile_picture">
                </div>
                <div class="form-group">
                    <label for="pass1">Password</label>
                    <input type="password" class="form-control" name="pass1" id="pass1">
                </div>
                <div class="form-group">
                    <label for="pass2">Repeat password</label>
                    <input type="password" class="form-control" name="pass2" id="pass2">
                </div>
                <input type="submit" class="btn btn-primary" name="submit">Submit</input>
            </form>
        </div>
    </div>

    </div>
</div>

<?php include "footer.php"; ?>