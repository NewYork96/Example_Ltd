<?php

// Új felhasználó adatainak ellenőrzése adatbázisba küldés előtt.
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
    if ($_POST['password'] == '') {
        $valid = false;
        $errors[] = 'Missing password!';
    }
    if ($_POST['password'] != $_POST['password2']) {
        $valid = false;
        $errors[] = 'Passwords do not match!';
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

// Adatok mentése sikeres regisztráció esetén.
    if ($valid) {
        
        $result = mysqli_query($db,'INSERT INTO users SET
            name="' . $_POST['name'] . '",
            email="' . $_POST['email'] . '",
            password="' . hashPassword($_POST['password']) . '",
            birth_date="' . $_POST['dateofbirth'] . '",
            birth_place="' . $_POST['placeofbirth'] . '",
            tax_number="' . $_POST['taxnumber'] . '",
            mother="' . $_POST['mother'] . '",
            role="' . $_POST['role'] . '"');
        if ($result) {
            ?>
            <div class="alert alert-success">Succesful registration!</div>
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
  };

?>

<!-- Regisztrációs űrlap. --> 
<h1>Registrating new user</h1>

<form action="index.php?modules=users&action=new" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="Email">Email address</label>
        <input type="text" class="form-control" name="email" id="Email" aria-describedby="emailHelp">
    </div>
        <div class="row">
            <div class="form-group col-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group col-6">
            <label for="password2">Password again</label>
            <input type="password" class="form-control" id="password2" name="password2" aria-describedby="password2Help">
        </div>
    </div>
    <div class="form-group">
        <label for="dateofbirth">Date of birth</label>
        <input type="text" class="form-control" name="dateofbirth" id="dateofbirth" placeholder="yyyy-mm-dd">
    </div>
    <div class="form-group">
        <label for="placeofbirth">Place of birth</label>
        <input type="text" class="form-control" name="placeofbirth" id="placeofbirth" >
    </div>
    <div class="form-group">
        <label for="taxnumber">Tax number</label>
        <input type="text" class="form-control" name="taxnumber" id="taxnumber" >
    </div>
    <div class="form-group">
        <label for="mother">Mother's name</label>
        <input type="text" class="form-control" name="mother" id="mother" >
    </div>
    <div class="form-group">
        <label for="role">Role</label>
          <select class="form-control" id="role" name="role" <?php foreach( ROLE as $key => $role): ?> >
          <option value="<?php echo $key; ?>"
          <?php !$valid && $_POST['role'] == $key ? 'selection' : ''; ?> 
         > 
         <?php echo ($role); ?>
         </option>
         <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>

<a href="index.php?modules=users"><button class="btn btn-primary">Back</button></a>