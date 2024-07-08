<?php

//Új mappa mentése adatbázisba.

if (isset($_POST['file_id'])) {
    $result = mysqli_query($db,'INSERT INTO projects SET
    name="' . $_POST['name'] . '",
    file_id=' . $_POST['file_id']);
   
    if ($result) { ?>
        <div class="alert alert-success">File succesfully created!</div>
 <?php   } 

}
?>
    <!-- Új mappa, file_id beállítása űrlap. -->
<form action="index.php?modules=files&action=new" method="post">
    <div class="form-group">
        <label for="name">Project name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="file_id">file_id</label>
          <select class="form-control" id="file_id" name="file_id" <?php foreach( STATUS as $key => $file_id): ?> >
            <option value="<?php echo $key; ?>"> 
                <?php echo ($file_id); ?>
            </option>
         <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<a href="index.php?modules=files"><button class="btn btn-primary">Back</button></a>