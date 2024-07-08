<?php

// Módosítások mentése adatbázisba.
    if (isset($_POST['id'])) {
              
              $result = mysqli_query($db,
                'UPDATE projects SET
                name="' . $_POST['name'] . '",
                starting_date="' . $_POST['startingdate'] . '",
                end_date="' . $_POST['enddate'] . '",
                payment="' . $_POST['payment'] . '",
                description="' . mysqli_real_escape_string($db, $_POST['description']). '",
                file_id="' . $_POST['file_id'] . '" WHERE id=' . $_POST['id']);
              if ($result) {
                  ?>
                  <div class="alert alert-success">Succesful update!</div>
                  <?php
              }    
      var_dump(mysqli_error($db));
          }
      
// Meglévő adatok kikérése adatbázisból.
     if (isset($_GET['id'])) {
        $query = 'SELECT * FROM projects WHERE id =' . $_GET['id'];
        $result = mysqli_query($db, $query);
        $projects = mysqli_fetch_assoc($result);
       };

?>
<!-- Adatok módosítására szolgáló űrlap. -->
<form action="index.php?modules=projects&id=<?php echo $projects["id"] ?>&action=edit"
          method="post" class="">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?? ''; ?>">
        <div class="form-group mb-2">
            <label for="name">Név</label>
            <input type="text" class="form-control" id="name"
                   name="name" value="<?php echo $projects['name']; ?>">
        </div>
          <div class="form-group mb-2">
            <label for="startingdate">Starting date</label>
            <input type="text" class="form-control" id="startingdate"
                   name="startingdate" value="<?php echo $projects['starting_date']; ?>">
        </div>
        <div class="form-group">
        <label for="enddate">End date</label>
        <input type="text" class="form-control" name="enddate" id="enddate" value="<?php echo $projects['end_date']; ?>">
    </div>
    <div class="form-group">
        <label for="payment">Payment</label>
        <input type="text" class="form-control" name="payment" id="payment" value="<?php echo $projects['payment'] . '$'; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" class="form-control summernote" name="description"><?php echo $projects['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="file_id">file_id</label>
          <select class="form-control" id="file_id" name="file_id" <?php foreach( STATUS as $key => $file_id): ?> >
          <option value="<?php echo $key; ?>"
          <?php //!$valid && $_POST['file_id'] == $key ? 'selection' : ''; ?> 
         > 
         <?php echo ($file_id); ?>
         </option>
         <?php endforeach; ?>
      </select>
    </div>

        <button type="submit" class="btn btn-success">Szerkesztés</button>
        <a href="index.php?modules=projects" class=" btn btn-warning">Vissza</a>
    </form>
