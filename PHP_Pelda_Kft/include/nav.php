<div class="list-group">
  <a href="index.php?modules=projects" class="list-group-item list-group-item-action 
    <?php 
      if ('projects' == $_GET['modules']) {
        echo 'active';
      } else {
        echo '' ;
      }; ?>">Projects
  </a>
  <a href="index.php?modules=files" class="list-group-item list-group-item-action 
    <?php 
      if ('files' == $_GET['modules']) {
        echo 'active';
      } else {
        echo '' ;
      }; 
    ?>">Files
  </a>
  <a href="index.php?modules=users" class="list-group-item list-group-item-action 
    <?php
    
// Jogosultság ellenőrzése.
      if ('3'== $_SESSION['role']) {
        echo '';
      } else {
        echo 'invisible' ;
      };
      if ('users' == $_GET['modules']) {
        echo 'active';
      } else {
        echo '' ;
      }; 
      ?>">Users
  </a>
</div>