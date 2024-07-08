<?php

//Felhasználó adatainak a módosítására vonatkozó validálás.
        $valid = true;
        if (isset($_POST) && isset($_POST['name'])) {
          $errors = [];
      
          if ($_POST['name'] == '') {
              $valid = false;
              $errors[] = 'Missing name';
          }
          if ($_POST['email'] == '') {
              $valid = false;
              $errors[] = 'Missing e-mail address!';
          }
          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $valid = false;
              $errors[] = 'Incorrect e-mail address!';
          }
          if ($_POST['dateofbirth'] == '') {
              $valid = false;
              $errors[] = 'Missing date of birth';
          } 
          if (strlen($_POST['taxnumber']) != 10) {
              $valid = false;
              $errors[] = 'Incorrect tax number!';
          }
          if ($_POST['mother'] == '') {
              $valid = false;
              $errors[] = 'Missing mother name!';
          } 
      
// Módosítások mentése.
          if ($valid) {
              $result = mysqli_query($db,'UPDATE users SET
                name="' . $_POST['name'] . '",
                email="' . $_POST['email'] . '",
                ' . ($_POST['password'] != '' ? 'password = "' . hashPassword($_POST['password']) . '",' : '') . '
                birth_date="' . $_POST['dateofbirth'] . '",
                birth_place="' . $_POST['placeofbirth'] . '",
                tax_number="' . $_POST['taxnumber'] . '",
                mother="' . $_POST['mother'] . '",
                role="' . $_POST['role'] . '" WHERE id=' . $_POST['id']);
              if ($result) {
                  ?>
                  <div class="alert alert-success">Succesful update!</div>
                  <?php
              }    

//Hiányzó adatokra figyelmeztető üzenet.
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
        };

// Felhasználó jelenlegi adatainak listázása.
     if (isset($_GET['id'])) {
        $query = 'SELECT * FROM users WHERE id =' . $_GET['id'];
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
       };

?>
<!-- Felhasználó adatainak módosítására szolgáló űrlap. -->
<form action="index.php?modules=users&id=<?php echo $row["id"] ?>&action=edit"
          method="post" class="">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?? ''; ?>">
        <div class="form-group mb-2">
            <label for="name">Név</label>
            <input type="text" class="form-control" id="name"
                   name="name" value="<?php echo $row['name']; ?>">
        </div>
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email"
                   name="email" value="<?php echo $row['email']; ?>">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
        <label for="dateofbirth">Date of birth</label>
        <input type="text" class="form-control" name="dateofbirth" id="dateofbirth" value="<?php echo $row['birth_date']; ?>">
    </div>
    <div class="form-group">
        <label for="placeofbirth">Place of birth</label>
        <input type="text" class="form-control" name="placeofbirth" id="placeofbirth" value="<?php echo $row['birth_place']; ?>">
    </div>
    <div class="form-group">
        <label for="taxnumber">Tax number</label>
        <input type="text" class="form-control" name="taxnumber" id="taxnumber" value="<?php echo $row['tax_number']; ?>">
    </div>
    <div class="form-group">
        <label for="mother">Mother's name</label>
        <input type="text" class="form-control" name="mother" id="mother"value="<?php echo $row['mother']; ?>">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
          <select class="form-control" id="role" name="role" <?php foreach( ROLE as $key => $role): ?> >
            <option value="<?php echo $key; ?>"
                <?php //!$valid && $_POST['role'] == $key ? 'selection' : ''; ?> > 
                <?php echo ($role); ?>
            </option>
         <?php endforeach; ?>
      </select>
    </div>

        <button type="submit" class="btn btn-success">Szerkesztés</button>
        <a href="index.php?modules=users" class=" btn btn-warning">Vissza</a>
    </form>