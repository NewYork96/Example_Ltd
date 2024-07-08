<?php
		define ('BASE_PATH', __DIR__);
		session_start();
		include ('include/header.php');
		require ('include/db_connection.php');
		require ('include/functions.php');
		require ('include/constans.php');	
?>

<body>
	
<!-- Átirányítás a bejelentkezésis felületre. -->
    <div class="container-fluid">
        <?php 
		
			if (!isset($_SESSION['id'])) {
		?>
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <?php include('modules/user_action/login.php'); ?>
                </div>
            </div>
	</div>

<!-- Főaldal bejelentkezés után. -->
	<?php } else { ?>

<!-- Navigáció. -->
	<div class="container-fluid pt-3">
		<div class="row">
			<div class="col-2">
                <?php include ('include/nav.php') ?>
			</div>

<!-- Tartalom megjelenítése. -->
			<div class="col-8">
				<?php 
				$modules= $_GET['modules'];
				include('modules/' . (is_file('modules/' .$modules . '.php') ? $modules  ?? 'projects' : '404') . '.php');
				?>
			</div>

<!--Kijelentkezés-->
			<div class="col-2">
				<div class="card">
					<h5 class="card-header">Logged in:</h5>
					<div class="align-self-center">
						<p><?php echo '<br>' . $_SESSION['name'];?></p>
					</div>
					<div class="card-footer">
						<a href="index.php?modules=users&&action=logout" class="d-flex justify-content-center"><button type="button" class="btn btn-warning">Logout</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
      <?php };
			require ('include/footer.php');
	?>
