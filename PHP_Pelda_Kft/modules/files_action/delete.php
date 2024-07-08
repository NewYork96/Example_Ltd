<?php
    $query = 'UPDATE projects  SET
              file_id= NULL
              WHERE id=' . $_GET['id'] . ' LIMIT 1';
    mysqli_query($db, $query);
    var_dump(mysqli_error($db));
?>

<div class="alert alert-success"><?php echo 'File deleted!'; ?> </div>  
<php http_response_code(200); ?>

<a href="index.php?modules=files"><button type="button" class="btn btn-primary">Vissza</button></a>