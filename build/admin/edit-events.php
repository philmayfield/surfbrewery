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

				<h2><?php echo $item ? 'Editing '.$item->name : 'Adding New Event'; ?></h2>

				<form id="update-form" action="admin/db_interface.php" method="post" enctype="multipart/form-data">

					<?php include_once('edit-form-setup.php'); ?>

					<div class="row">
						
						<div class="col-xs-12 col-md-8">
							<fieldset class="form-group">
								<label for="name">Event Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Ex: Taste of Ventura" value="<?php if($item) echo $item->name; ?>" required>
							</fieldset>

							<fieldset class="form-group">
								<label for="description">Event Description</label>
								<textarea class="form-control" id="description" name="description" rows="4" placeholder="Description"><?php if($item) echo $item->description; ?></textarea>
							</fieldset>

						</div>
						<div class="col-xs-12 col-md-4">

							<fieldset class="form-group">
								<label for="date">Event Date</label>
								<input type="text" class="form-control datepicker" id="date" name="date" value="" data-value="<?php if($item) echo $item->date; ?>" required>
							</fieldset>

							<fieldset class="form-group">
								<label for="link">Link</label>
								<input type="text" class="form-control" id="link" name="link" placeholder="http://venturawinterwinewalk.com/" value="<?php if($item) echo $item->link; ?>">
							</fieldset>

							<fieldset class="form-group">
								<label for="loc">Location</label>
								<select class="form-control c-select" id="loc" name="loc">
									<option value="B" <?php if($item && $item->loc == 'B') echo 'selected'; ?>>Brewery</option>
									<option value="O" <?php if($item && $item->loc == 'O') echo 'selected'; ?>>Offsite</option>
								</select>
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
									<button type="submit" class="btn btn-primary">Add New Event</button>
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