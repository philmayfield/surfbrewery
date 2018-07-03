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

				<h2>Editing Hours</h2>

				<p>To set a day as closed, input &ldquo;Closed&rdquo; in both Open and Close fields for that day.</p>

				<form id="update-form" action="admin/db_interface.php" method="post" enctype="multipart/form-data">

					<?php include_once('edit-form-setup.php'); ?>

					<div class="row">

						<div class="col-xs-12 col-lg-6">
							
							<div class="row">
								<div class="col-xs-4 hours-day">
									<h4>Monday</h4>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="mo_o">Open</label>
										<input type="text" class="form-control" id="mo_o" name="mo_o" placeholder="Ex: 1PM" value="<?php if($item) echo $item->mo_o; ?>" required>
									</fieldset>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="mo_c">Close</label>
										<input type="text" class="form-control" id="mo_c" name="mo_c" placeholder="Ex: 9PM" value="<?php if($item) echo $item->mo_c; ?>" required>
									</fieldset>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-4 hours-day">
									<h4>Tuesday</h4>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="tu_o">Open</label>
										<input type="text" class="form-control" id="tu_o" name="tu_o" placeholder="Ex: 1PM" value="<?php if($item) echo $item->tu_o; ?>" required>
									</fieldset>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="tu_c">Close</label>
										<input type="text" class="form-control" id="tu_c" name="tu_c" placeholder="Ex: 9PM" value="<?php if($item) echo $item->tu_c; ?>" required>
									</fieldset>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-4 hours-day">
									<h4>Wednesday</h4>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="we_o">Open</label>
										<input type="text" class="form-control" id="we_o" name="we_o" placeholder="Ex: 1PM" value="<?php if($item) echo $item->we_o; ?>" required>
									</fieldset>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="we_c">Close</label>
										<input type="text" class="form-control" id="we_c" name="we_c" placeholder="Ex: 9PM" value="<?php if($item) echo $item->we_c; ?>" required>
									</fieldset>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-4 hours-day">
									<h4>Thursday</h4>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="th_o">Open</label>
										<input type="text" class="form-control" id="th_o" name="th_o" placeholder="Ex: 1PM" value="<?php if($item) echo $item->th_o; ?>" required>
									</fieldset>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="th_c">Close</label>
										<input type="text" class="form-control" id="th_c" name="th_c" placeholder="Ex: 9PM" value="<?php if($item) echo $item->th_c; ?>" required>
									</fieldset>
								</div>
							</div>

						</div>
						<div class="col-xs-12 col-lg-6">
							
							<div class="row">
								<div class="col-xs-4 hours-day">
									<h4>Friday</h4>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="fr_o">Open</label>
										<input type="text" class="form-control" id="fr_o" name="fr_o" placeholder="Ex: 1PM" value="<?php if($item) echo $item->fr_o; ?>" required>
									</fieldset>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="fr_c">Close</label>
										<input type="text" class="form-control" id="fr_c" name="fr_c" placeholder="Ex: 9PM" value="<?php if($item) echo $item->fr_c; ?>" required>
									</fieldset>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-4 hours-day">
									<h4>Saturday</h4>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="sa_o">Open</label>
										<input type="text" class="form-control" id="sa_o" name="sa_o" placeholder="Ex: 1PM" value="<?php if($item) echo $item->sa_o; ?>" required>
									</fieldset>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="sa_c">Close</label>
										<input type="text" class="form-control" id="sa_c" name="sa_c" placeholder="Ex: 9PM" value="<?php if($item) echo $item->sa_c; ?>" required>
									</fieldset>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-4 hours-day">
									<h4>Sunday</h4>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="su_o">Open</label>
										<input type="text" class="form-control" id="su_o" name="su_o" placeholder="Ex: 1PM" value="<?php if($item) echo $item->su_o; ?>" required>
									</fieldset>
								</div>
								<div class="col-xs-4">
									<fieldset class="form-group">
										<label for="su_c">Close</label>
										<input type="text" class="form-control" id="su_c" name="su_c" placeholder="Ex: 9PM" value="<?php if($item) echo $item->su_c; ?>" required>
									</fieldset>
								</div>
							</div>

						</div>
						
					</div>

					<fieldset class="form-group">
						<label for="note">Hours Special Note</label>
						<textarea class="form-control" id="note" name="note" rows="2" placeholder="Special Note"><?php if($item) echo $item->note; ?></textarea>
						<small>Displays along with the hours on the website, used to disclaim unique circumstances such as holidays.</small>
					</fieldset>

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