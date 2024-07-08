<?php

// Adatok kikérése adatbázisból.
    $query = 'SELECT * FROM projects WHERE id=' . $_GET['id'] . ' LIMIT 1';
    $result = mysqli_query($db, $query);
    $files = mysqli_fetch_assoc($result);
    ?>

<!-- Kikért adatok megjelenítése. -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">
                         <td><?php echo $files['name']; ?></td>
                    </h4>                
                </div>
                <div class="card-body">               
                    <span><?php echo is_null($files['file_id'])  ? '404, file not found :)' : STATUS[$files['file_id']]; ?></span>
                </div>
                <div class="card-footer">
                    <a href="index.php?modules=files" class=" btn btn-primary">Back</a>
                    <a href="index.php?modules=files&id=<?php echo $files["id"] ?>&action=edit"   class=" btn btn-warning <?php echo 1 == $_SESSION['role'] ? 'invisible' : '' ?>"
                        data-toggle="tooltip" data-placement="top" title="Edit">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
