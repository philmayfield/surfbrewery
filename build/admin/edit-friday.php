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

				<h2>Editing Friday</h2>

				<form id="update-form" action="admin/db_interface.php" method="post" enctype="multipart/form-data">

					<?php include_once('edit-form-setup.php'); ?>

					<div class="row">
						
						<div class="col-xs-12">

							<fieldset class="form-group">
								<label for="value">Friday Content</label>
								<textarea class="form-control" id="value" name="value" rows="2" placeholder="Friday Content"><?php if($item) echo $item->value; ?></textarea>
								<small>If nothing is happening on this Friday, its okay to leave blank.</small>
							</fieldset>

						</div>

					</div>

					<div class="row">
						<div class="col-xs-12 text-xs-center text-sm-right">
							<hr>
							<div id="form-msg" class="text-xs-center"></div>
							<button type="submit" class="btn btn-primary">Save Changes</button>
						</div>
					</div>

				</form>

			</section>

		</main>

	<?php include_once('scripts.php'); ?>

	</body>

</html>

<?php

$conn = null; // Close connection

?>