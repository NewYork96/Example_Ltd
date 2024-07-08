<?php

// Adatok kikérése adatbázisból.

    $query = 'SELECT * FROM projects ORDER BY id';
    $result = mysqli_query($db, $query);
?>

<!-- Új mappa létrehozása. -->

     <div class="d-flex bd-highlight">
        <h1 class="flex-grow-1">Files</h1>
        <div>
            <a href="index.php?modules=files&action=new" class="btn btn-primary <?php echo 1 == $_SESSION['role'] ? 'invisible' : '' ?>">
                 New file
            </a>
        </div>
    </div>

<!--Adatokat megjelenítő táblázat. -->

    <table class="table table-striped table-hover">
        <thead>
        <tr class="text-center">
            <th scope="col">Name</th>
            <th scope="col">File</th>
            <th scope="col"><?php echo $_SESSION['role'] == 1 ? 'Option' : 'Options' ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)):
            $url = 'index.php?modules=files&id=' . $row['id'];
            ?>
            <tr class="row-<?php echo $row['id']; ?> text-center" ">
                <td ><?php echo $row['name']; ?></td>
                <td ><?php echo is_null($row['file_id'])  ? '404, file not found :)' : STATUS[$row['file_id']]; ?></td>
                <td>
            
            <!-- Megtekintés gomb. -->

                    <div class="btn-group" role="group">
                        <a href="index.php?modules=files&id=<?php echo $row["id"] ?>&action=show" 
                            class=" btn btn-secondary"
                            title="Adatlap">
                           Check
                        </a>
            
            <!--Törlés gomb. -->

                        <a href="index.php?modules=files&id=<?php echo $row["id"] ?>&action=delete"
                           class="btn btn-danger delete <?php echo 1 == $_SESSION['role'] ? 'invisible' : '' ?>"
                           title="Törlés">
                           Delete
                        </a>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>