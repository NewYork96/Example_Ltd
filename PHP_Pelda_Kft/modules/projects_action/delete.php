<?php
    $query = 'DELETE FROM projects WHERE id=' . $_GET['id'] . ' LIMIT 1';
        mysqli_query($db, $query);
?>

<div class="alert alert-success"><?php echo 'Project deleted!'; ?> </div>  
<php http_response_code(200); ?>

<a href="index.php?modules=projects"><button type="button" class="btn btn-primary">Vissza</button></a>