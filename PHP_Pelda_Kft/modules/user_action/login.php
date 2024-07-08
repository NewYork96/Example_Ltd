<h1 class="mt-5 pt-3 text-center">Bejelentkezés</h1>

<?php

// Felhasználó adatainak kikérése adatbázisból.
if (isset($_POST) && isset($_POST['email']) && isset($_POST['password'])) {
    $query = 'SELECT * FROM users WHERE email="' . $_POST['email'] . '" LIMIT 1';
    $result = mysqli_query($db, $query);

// Felhasználó adatainak mentése a $_Session-be és átirányítás a főoldalra.
    if (($row = mysqli_fetch_assoc($result)) && password_verify($_POST['password'], $row['password'])) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        header('Location: index.php?modules=projects');
        exit;
    } else
    ?>
    <div class="alert alert-danger">
        Nem megfelelő email/jelszó páros!
    </div>
    <?php
}
?>
<!-- Belépésre szolgáló úrlap. --> 
<form action="index.php?modules=login" method="post" class="mt-3">
    <div class="form-group mb-2">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group mb-2">
        <label for="password">Jelszó</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>