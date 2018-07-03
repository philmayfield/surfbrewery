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

				<h2><?php echo $item ? 'Editing '.$item->title : 'Adding New News Item'; ?></h2>

				<form id="update-form" action="admin/db_interface.php" method="post" enctype="multipart/form-data">

					<?php include_once('edit-form-setup.php'); ?>

					<div class="row">
						
						<div class="col-xs-12 col-md-8">

							<fieldset class="form-group">
								<label for="title">News Article Title</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Article Title" value="<?php if($item) echo $item->title; ?>">
							</fieldset>

							<fieldset class="form-group">
								<label for="link">Link</label>
								<input type="text" class="form-control" id="link" name="link" placeholder="Ex: http://www.foodgps.com/the-surf-in-ventura-is-rising/" value="<?php if($item) echo $item->link; ?>">
							</fieldset>

							<fieldset class="form-group">
								<label for="text">News Text</label>
								<textarea class="form-control" id="text" name="text" rows="4" placeholder="Sample of Article Text"><?php if($item) echo $item->text; ?></textarea>
								<small class="text-muted">Text is trucated to the first line when displayed on the site, but still accessible for SEO.</small>
							</fieldset>

						</div>
						<div class="col-xs-12 col-md-4">

							<fieldset class="form-group">
								<label for="source">News Source</label>
								<input type="text" class="form-control" id="source" name="source" placeholder="Ex: FoodGPS" value="<?php if($item) echo $item->source; ?>" required>
							</fieldset>
							

							<fieldset class="form-group">
								<label for="date">Article Date</label>
								<input type="text" class="form-control datepicker" id="date" name="date" value="" data-value="<?php if($item) echo $item->date; ?>" required>
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
									<button type="submit" class="btn btn-primary">Add News</button>
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