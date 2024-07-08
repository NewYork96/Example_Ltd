<?php 

// Felhasználók listázása adatbázisból.
    $query = 'SELECT * FROM users ORDER BY name';
    $result = mysqli_query($db, $query);
?>
     <div class="d-flex bd-highlight">
        <h1 class="flex-grow-1">Users</h1>
        <div>

<!-- Új felhasználó létrehozása gomb. -->
            <a href="index.php?modules=users&action=new" class="btn btn-primary">
                 New User
            </a>
        </div>
    </div>
<!-- Felhasználók listája. -->
    <table class="table table-striped table-hover">
        <thead>
        <tr class="text-center">
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)):
            $url = 'index.php?modules=users&id=' . $row['id'];
            ?>
            <tr class="row-<?php echo $row['id']; ?>">
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>

<!-- Felhasználó adatainak megtekintése. -->
                    <div class="btn-group" role="group">
                        <a href="index.php?modules=users&id=<?php echo $row["id"] ?>&action=show" 
                            class=" btn btn-secondary"
                            title="Adatlap">
                           Check
                        </a>

<!-- Felhasználó adatainak szerkesztése. -->
                        <a href="index.php?modules=users&id=<?php echo $row["id"] ?>&action=edit"  class=" btn btn-warning"
                           data-toggle="tooltip" data-placement="top" title="Szerkesztés">
                           Edit
                        </a>
<!-- Felhasználó törlése. -->
                        <a href="index.php?modules=users&id=<?php echo $row["id"] ?>&action=delete"
                           class="btn btn-danger delete"
                           title="Törlés">
                           Delete
                        </a>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>