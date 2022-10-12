<!-- generate admin panel that will display a list of users and their information that you can delete or manage profiles. -->
<?php 
session_start();
include "database.php";

if(isset($_SESSION['id_user']) && $_SESSION['admin']==1){
    
        $command="SELECT * FROM users";
        $stmt = $pdo->query($command);
        if($stmt->rowCount()>=1){
           
            $rows=$stmt->fetchAll();
            echo'<br/><table border="2">';
            echo '<tr>'.'<td>'.'<b>'.'ID'.'</b>'.'</td>'.'<td>'.'<b>'.'Username'.'</b>'.'</td>'.'<td>'.'<b>'.'Email'.'</b>'.'</td>'.'<td>'.'<b>'.'Admin'.'</b>'.'</td>'.'<td>'.'<b>Action'.'</b>'.'<td>'.'<b>Subbed'.'</td>'.'</b>'.'</td>'.'</tr>';
            foreach($rows as $user){
                echo "<tr>";
                echo '<td>' . $user['id_user'].'</td>'.'<td>' . $user['username'] . '</td>'.'<td>' . $user['email'].'</td>'.'<td>' . $user['admin'].'</td>'; ?>
                <td><a href="deleteUser.php?id=<?=$user['id_user'] ?>">Delete</a></td>
                <td><a href="changeSubscription.php?id=<?=$user['id_user'] ?>">Change subscription</a></td>
                <?php echo "</tr>".'</br>';
                
            }
            
        }
        
}
else{
    header('location: index.php');
}

 ?>

