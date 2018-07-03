<?php

session_start();

require_once('../db_connect.php'); // Sets up $conn
require_once('login_test.php'); // requires session_start(), sets up $logged_in, $user, $userdata;
require_once('edit-setup.php'); // requires edit setup

?>

<!DOCTYPE html>
<html class="no-js">
    <?php include_once('head.php'); ?>
    <body>

		<?php include_once('header.php'); ?>

    	<main class="container m-y-2">

			<section class="card card-block">

				<h2><?php echo $item ? 'Editing '.$item->name : 'Adding New Class'; ?></h2>

				<form id="update-form" action="admin/db_interface.php" method="post" enctype="multipart/form-data">

					<?php include_once('edit-form-setup.php'); ?>

					<div class="row">
						
						<div class="col-xs-12 col-md-12 col-lg-5">

							<fieldset class="form-group">
								<label for="name">Class Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Ex: Beginning Homebrew Class" value="<?php if($item) echo $item->name; ?>" required>
							</fieldset>

						</div>
						<div class="col-xs-12 col-md-6 col-lg-4">

							<fieldset class="form-group">
								<label for="date">Class Date</label>
								<input type="text" class="form-control datepicker" id="date" name="date" value="" data-value="<?php if($item) echo $item->date; ?>" required>
							</fieldset>

						</div>

						<div class="col-xs-12 col-md-6 col-lg-3">

							<fieldset class="form-group">
								<label for="time">Class Time</label>
								<input type="text" class="form-control" id="time" name="time" placeholder="12:00 - 3:30pm" value="<?php if($item) echo $item->time; ?>" required>
							</fieldset>

						</div>

					</div>

					<div class="row">
						<div class="col-xs-12 text-xs-center text-sm-right">
							<hr>
							<div id="form-msg" class="text-xs-center"></div>
							<?php if ($item) {
									include_once('save-delete-buttons.php');
								} else {
									?>
									<button type="submit" class="btn btn-primary">Add New Class</button>
									<?php
								}
							?>
						</div>
					</div>

				</form>

			</section>

		</main>

	<link rel='stylesheet' href='css/default.css' />
	<link rel='stylesheet' href='css/default.date.css' />
	<link rel='stylesheet' href='css/default.time.css' />
	<?php include_once('scripts.php'); ?>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script src="js/picker.time.js"></script>

	</body>

</html>

<?php

$conn = null; // Close connection

?>