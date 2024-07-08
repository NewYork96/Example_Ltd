<?php
    $query = 'DELETE FROM users WHERE id=' . $_GET['id'] . ' LIMIT 1';
        mysqli_query($db, $query);
?>

<div class="alert alert-success"><?php echo 'User deleted!'; ?></div>  

<a href="index.php?modules=users"><button type="button" class="btn btn-primary">Vissza</button></a>