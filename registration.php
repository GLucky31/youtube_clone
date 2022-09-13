<?php
include_once './header.php';
?>

<h1>Registracija</h1>

<form action="user_insert.php" method="post">
    <input type="text" name="first_name" class="form-control mb-4" placeholder="Vnesi ime" required="required" />
    <input type="text" name="last_name" class="form-control mb-4" placeholder="Vnesi priimek" required="required" />
    <input type="email" name="email" class="form-control mb-4" placeholder="Vnesi e-pošto" required="required" />
    <input type="text" name="phone" class="form-control mb-4" placeholder="Vnesi telefon" />
    <input type="date" name="birthday" class="form-control mb-4" value="2000-01-01" placeholder="Vnesi datum rojstva" />
    <input type="text" name="address" class="form-control mb-4" placeholder="Vnesi naslov" required="required"/>
    <select name="city_id" class="form-control mb-4">
        <?php
        include_once './database.php';
        $query = "SELECT * FROM cities ORDER BY title";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
        }
        ?>
    </select>
    <input type="password" name="pass1" class="form-control mb-4" placeholder="Vnesi geslo" required="required" />
    <input type="password" name="pass2" class="form-control mb-4" placeholder="Ponovi geslo" required="required" />
    <input type="submit" value="Shrani" />
</form>

<?php
include_once './footer.php';
?>