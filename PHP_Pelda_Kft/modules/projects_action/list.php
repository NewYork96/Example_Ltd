<?php 

// Adatok kikérése adatbázisból.
    $query = 'SELECT * FROM projects ORDER BY id';
    $result = mysqli_query($db, $query);
?>

<!-- Új projekt létrehozása. -->
     <div class="d-flex bd-highlight">
        <a href="index.php?modules=projects&action=new" class="btn btn-primary <?php echo 1 == $_SESSION['role'] ? 'invisible' : '' ?>">
                New Project
        </a>
    </div>

<!-- Projekteket tartalmazó lista. -->
    <table class="table table-striped table-hover">
        <thead>
        <tr class="text-center">
            <th scope="col">Name</th>
            <th scope="col">Starting date</th>
            <th scope="col"><?php echo $_SESSION['role'] == 1 ? 'Option' : 'Options' ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)):
            $url = 'index.php?modules=projects&id=' . $row['id'];
            ?>
            <tr class="row-<?php echo $row['id']; ?> text-center" ">
                <td ><?php echo $row['name']; ?></td>
                <td ><?php echo $row['starting_date']; ?></td>
                <td>
                    <div>
<!-- Projekt törlése gomb. -->
                        <a href="index.php?modules=projects&id=<?php echo $row["id"] ?>&action=delete"
                           class="btn btn-danger delete <?php echo 1 == $_SESSION['role'] ? 'invisible' : '' ?>"
                           title="Törlés">
                           Delete
                        </a>

<!-- Projekt megtekintése gomb. -->
                        <a href="index.php?modules=projects&id=<?php echo $row["id"] ?>&action=show" 
                            class=" btn btn-secondary"
                            title="Adatlap">
                           Check
                        </a>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>