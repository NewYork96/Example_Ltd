<?php

//Munka mentésekor beküldött adatok validálása.
$valid = true;
    if (isset($_POST) && isset($_POST['date'])) {
          $errors = [];
        if ($_POST['date'] == '') {
            $valid = false;
            $errors[] = 'You have to give the date!';
        }
        if ($_POST['timespend'] == '') {
            $valid = false;
            $errors[] = 'You have to give the time, what you spend with the project!';
        }
        
// Munkalap mentése adatbázisba.
        if ($valid) {
            $result = mysqli_query($db,'INSERT INTO works SET
                comment="' . $_POST['comment'] . '",
                date="' . $_POST['date'] . '",
                time="' . $_POST['timespend'] . '",
                user_id="' . $_SESSION['id'] . '",
                project_id=' . $_GET['id']);
            if ($result) { 
?>
                <div class="alert alert-success">Work succesfully created!</div>
 <?php      
            }

// Hiányzó adatokra figyelmeztető üzenet.
        } else {
            ?>
            <div class="alert alert-danger">
                Missing dates!
                <ul class="m-0">
                    <?php
                    foreach ($errors as $error) {
                        echo '<li>' . $error . '</li>';
                    }
                    ?>
                </ul>
            </div>
<?php
        }
    }

// Projekt  adatatinak listázása adatbázisból.
    $query = 'SELECT * FROM projects 
     WHERE projects.id=' . $_GET['id'] . ' LIMIT 1';
    $result = mysqli_query($db, $query);
    $projects = mysqli_fetch_assoc($result);
    $role = ' ';
    if ($_SESSION['role'] == 1) {
        $role =  ' AND user_id=' . $_SESSION['id'] . ' ' ;
    }

// A projekthez tartozó munkalapok kikérése adatbázisból jogosultság ellenőrzésével.
    $query2 = 'SELECT * FROM works
            LEFT JOIN users ON works.user_id = users.id
            WHERE project_id=' . $_GET['id'] . $role . ' ORDER BY date'; 
    $result2 = mysqli_query($db,$query2);
?>

<!-- Projekt adatainak megjelenítése. -->
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4 class="m-0">
                        <td><?php echo $projects['name']; ?></td>
                </h4>                
            </div>
            <div class="card-body">               
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Starting Date:</th>
                            <td><?php echo $projects['starting_date']; ?></td>
                        </tr>
                        <tr>
                            <th>End date:</th>
                            <td><?php echo $projects['end_date']; ?></td>
                        </tr>
                        <tr>
                            <th>payment:</th>
                            <td><?php echo $projects['payment'] . '$'; ?></td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td><?php echo $projects['description']; ?></td>
                        </tr>
                        <tr>
                            <th>File status:</th>
                            <td><?php echo is_null($projects['file_id'])  ? '404, file not found :)' : STATUS[$projects['file_id']]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="index.php?modules=projects" class=" btn btn-primary">Back</a>
                <a href="index.php?modules=projects&id=<?php echo $_GET["id"] ?>&action=edit"  class=" btn btn-warning <?php echo 1 == $_SESSION['role'] ? 'invisible' : '' ?>"
                           data-toggle="tooltip" data-placement="top" title="Edit">
                           Edit
                </a>
            </div>
        </div>
    </div>

<!-- Munkalap mentésére szolgáló űrlap. -->
    <div class="col-6">
        <div class="card">
             <div class="card-header">
               <h5>Add work time</h5>
            </div>
            <div class="card-body">
                <form action="index.php?modules=projects&id=<?php echo $projects["id"] ?>&action=show" method="post">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control" name="date" id="date" placeholder="yyyy-mm-dd">
                    </div>
                    <div class="form-group">
                        <label for="timespend">Time spend</label>
                        <input type="text" class="form-control" name="timespend" id="timespend" placeholder="00:00:00">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <input type="text" id="description" class="form-control" name="comment">
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
                </form>
            </div>
            </div>
    </div>

<!-- Projekthez tartozó munkalapok lekérése. -->
<div class="row mt-3">
    <div class="col">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Worker</th>
                <th scope="col">Date</th>
                <th scope="col">Time spend</th>
                <th scope="col">Comment</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($works = mysqli_fetch_assoc($result2)): ?>
                <tr>
                    <td><?php echo $works['name']; ?></td>
                    <td><?php echo $works['date']; ?></td>
                    <td><?php echo $works['time']; ?></td>
                    <td><?php echo $works['comment']; ?></td>
                </tr>
        <?php endwhile;?>
            </tbody>
    </table>
    </div>
</div>