<?php

    // Mappa módosítása.
if (isset($_POST['file_id'])) {

    $result = mysqli_query($db,'UPDATE projects SET
        file_id="' . $_POST['file_id'] . '"
        WHERE id=' . $_GET['id']);
    if ($result) {
        header('location: index.php?modules=files ');
    }    
}     

    // Adatok megjelenítése.
if (isset($_GET['id'])) {
        $query = 'SELECT * FROM projects WHERE id =' . $_GET['id'];
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
};
    // Mappa módosítás űrlapja.
?>
<form action="index.php?modules=files&id=<?php echo $row["id"] ?>&action=edit" method="post">
    <div class="form-group">
        <label for="file_id">File</label>
          <select class="form-control" id="file_id" name="file_id" <?php foreach(STATUS as $key => $file_id): ?> >
          <option value="<?php echo $key; ?>"
         > 
         <?php echo ($file_id); ?>
         </option>
         <?php endforeach; ?>
      </select>
    </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="index.php?modules=files" class=" btn btn-warning">Back</a>
</form>