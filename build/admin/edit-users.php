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

				<h2><?php echo $item ? 'Editing '.$item->login : 'Adding New User'; ?></h2>

				<form id="update-form" action="admin/db_interface.php" method="post" enctype="multipart/form-data">

					<?php include_once('edit-form-setup.php'); ?>

					<div class="row">

						<div class="col-xs-12 col-md-4 col-lg-5">
							<fieldset class="form-group">
								<label for="login">Login</label>
								<input type="text" class="form-control" id="login" name="login" value="<?php if($item) echo $item->login; ?>" required>
							</fieldset>
							<fieldset class="form-group">
								<label for="password">Password</label>
								<input type="text" class="form-control" id="password" name="password" value="<?php if($item) echo $item->password; ?>" required>
							</fieldset>
						</div>
						<div class="col-xs-12 col-md-8 col-lg-7">
							<fieldset class="form-group">
								<legend>Access to Edit</legend>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-4">

										<div class="checkbox">
											<label>
												<input type="hidden" name="access_beer" value="0">
												<input type="checkbox" name="access_beer" value="1" <?php if ($item && $item->access_beer == 1) echo 'checked'; ?>>
												Beer
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="hidden" name="access_events" value="0">
												<input type="checkbox" name="access_events" value="1" <?php if ($item && $item->access_events == 1) echo 'checked'; ?>>
												Events
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="hidden" name="access_hoprocket" value="0">
												<input type="checkbox" name="access_hoprocket" value="1" <?php if ($item && $item->access_hoprocket == 1) echo 'checked'; ?>>
												Hop Rocket
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="hidden" name="access_barrel" value="0">
												<input type="checkbox" name="access_barrel" value="1" <?php if ($item && $item->access_barrel == 1) echo 'checked'; ?>>
												Barrel
											</label>
										</div>

									</div>

									<div class="col-xs-12 col-sm-6 col-md-4">

										<div class="checkbox">
											<label>
												<input type="hidden" name="access_friday" value="0">
												<input type="checkbox" name="access_friday" value="1" <?php if ($item && $item->access_friday == 1) echo 'checked'; ?>>
												Friday
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="hidden" name="access_bands" value="0">
												<input type="checkbox" name="access_bands" value="1" <?php if ($item && $item->access_bands == 1) echo 'checked'; ?>>
												Bands
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="hidden" name="access_news" value="0">
												<input type="checkbox" name="access_news" value="1" <?php if ($item && $item->access_news == 1) echo 'checked'; ?>>
												News
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="hidden" name="access_classes" value="0">
												<input type="checkbox" name="access_classes" value="1" <?php if ($item && $item->access_classes == 1) echo 'checked'; ?>>
												Classes
											</label>
										</div>

									</div>

									<div class="col-xs-12 col-sm-6 col-md-4">

										<div class="checkbox">
											<label>
												<input type="hidden" name="access_cask" value="0">
												<input type="checkbox" name="access_cask" value="1" <?php if ($item && $item->access_cask == 1) echo 'checked'; ?>>
												Cask
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="hidden" name="access_shop" value="0">
												<input type="checkbox" name="access_shop" value="1" <?php if ($item && $item->access_shop == 1) echo 'checked'; ?>>
												Shop
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="hidden" name="access_hours" value="0">
												<input type="checkbox" name="access_hours" value="1" <?php if ($item && $item->access_hours == 1) echo 'checked'; ?>>
												Hours
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="hidden" name="access_users" value="0">
												<input type="checkbox" name="access_users" value="1" <?php if ($item && $item->access_users == 1) echo 'checked'; ?>>
												Users
											</label>
										</div>

									</div>

								</div>
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
									<button type="submit" class="btn btn-primary">Add New User</button>
									<?php
								}
							?>
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