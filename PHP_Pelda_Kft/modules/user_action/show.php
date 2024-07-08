<?php

// Felhasználó adatainak kikésére adatbázisból.
    $query = 'SELECT * FROM users WHERE id=' . $_GET['id'] . ' LIMIT 1';
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    ?>
    
<!-- Felhasználó adatainak megjelenítése. -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">
                        <span>#<?php echo $user['id']; ?></span>
                        <?php echo $user['name']; ?>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                            <td>Password:</td>
                            <td>#TOP SECRET</td>
                            </tr>
                            <tr>
                            <td>Date of birth:</td>
                            <td><?php echo $user['birth_date']; ?></td>
                            </tr>
                            <tr>
                            <td>Place of birth:</td>
                            <td><?php echo $user['birth_place']; ?></td>
                            </tr>
                            <tr>
                            <td>Tax number:</td>
                            <td><?php echo $user['tax_number']; ?></td>
                            </tr>
                            <tr>
                            <td>Mother's name:</td>
                            <td><?php echo $user['mother']; ?></td>
                            </tr>
                            <tr>
                            <td>Role:</td>
                            <td><?php echo ROLE [$user['role']]; ?></td>
                            </tr>
                        </tbody>
                    </table>                   
                </div>
                <div class="card-footer">
                    <a href="index.php?modules=users" class=" btn btn-warning">Vissza</a>
                </div>
            </div>
        </div>
    </div>