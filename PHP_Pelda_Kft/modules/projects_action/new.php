<?php

// Adatok validálása adatbázisba küldés előtt.
$valid = true;
        if (isset($_POST) && isset($_POST['name'])) {
          $errors = [];
      
          if ($_POST['name'] == '') {
              $valid = false;
              $errors[] = 'Missing project name!';
          }
          if ($_POST['startingdate'] == '') {
              $valid = false;
              $errors[] = 'Missing starting date!';
          }
          if ($_POST['enddate'] == '') {
              $valid = false;
              $errors[] = 'Missing end date';
          } 
          if ($_POST['payment'] == '') {
              $valid = false;
              $errors[] = 'Missing payment!';
          } 
          if ($_POST['description'] == '') {
            $valid = false;
            $errors[] = 'Missing description!';
          }

// Adatok mentése adatbázisba.
            if ($valid) {
                $result = mysqli_query($db,'INSERT INTO projects SET
                    name="' . $_POST['name'] . '",
                    starting_date="' . $_POST['startingdate'] . '",
                    end_date="' . $_POST['enddate'] . '",
                    payment="' . $_POST['payment'] . '",
                    description="' . mysqli_real_escape_string($db, $_POST['description']). '",
                    file_id=' . $_POST['file_id']);
            if ($result) { ?>
                <div class="alert alert-success">Project succesfully created!</div>
    <?php   }

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
?>
<!-- Projekt létrehozására szolgáló űrrlap. -->
<form action="index.php?modules=projects&action=new" method="post">
    <div class="form-group">
        <label for="name">Project name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="startingdate">Starting date</label>
            <input type="text" class="form-control" name="startingdate" id="startingdate" placeholder="yyyy-mm-dd">
        </div>
        <div class="form-group col-6">
            <label for="enddate">End date</label>
            <input type="text" class="form-control" name="enddate" id="enddate" placeholder="yyyy-mm-dd">
        </div>
    </div>
    <div class="form-group">
        <label for="payment">Payment</label>
        <input type="text" class="form-control" name="payment" id="payment">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" class="form-control summernote" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="file_id">File</label>
          <select class="form-control" id="file_id" name="file_id" <?php foreach( STATUS as $key => $file_id): ?> >
          <option value="<?php echo $key; ?>"
         > 
         <?php echo ($file_id); ?>
         </option>
         <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
<a href="index.php?modules=projects"><button class="btn btn-primary">Back</button></a>
