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

				<h2><?php echo $item ? 'Editing '.$item->name : 'Adding New Item'; ?></h2>

				<p>Items are grouped first by Type (grain/hops/yeast) then by Group (pellets/leaf etc.) then by Pricing (not individually priced first) then alphabetically.  Grouped pricing will use the price of the first item, so if an item does not fit into the group pricing, be sure to set Price Individually to yes.</p>

				<form id="update-form" action="admin/db_interface.php" method="post" enctype="multipart/form-data">

					<?php include_once('edit-form-setup.php'); ?>

					<input type="hidden" name="date_modified" value="<?php echo date('Y-m-d'); ?>">

					<div class="row">

						<div class="col-xs-12 col-lg-4">
							<fieldset class="form-group">
								<label for="name">Item Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Ex: Simcoe" value="<?php if($item) echo $item->name; ?>" required>
							</fieldset>
						</div>
						<div class="col-xs-12 col-lg-4">
							<fieldset class="form-group">
								<label for="type">Item Type</label>
								<select class="form-control c-select" id="type" name="type" required>
									<option value="grain" <?php if($item && $item->type == 'grain') echo 'selected'; ?>>Grain</option>
									<option value="hops" <?php if($item && $item->type == 'hops') echo 'selected'; ?>>Hops</option>
									<option value="yeast" <?php if($item && $item->type == 'yeast') echo 'selected'; ?>>Yeast</option>
								</select>
							</fieldset>
						</div>
						<div class="col-xs-12 col-lg-4">
							<fieldset class="form-group">
								<label for="group">Item Group</label>
								<input type="text" class="form-control" id="group" name="group" list="groups" placeholder="Ex: Pellets" value="<?php if($item) echo $item->group; ?>" required>
							</fieldset>
						</div>

						<datalist id="groups">
						    <option value="American Base Malt">
						    <option value="European Base Malt">
						    <option value="Specialty Malt">
						    <option value="1 Pound Bags">
						    <option value="Pellets">
						    <option value="Leaf">
						    <option value="White Labs">
						    <option value="Fermentis">
						    <option value="Wyeast">
						    <option value="Lavin">
						    <option value="Lallemand">
						</datalist>

					</div>

					<div class="row">
						<div class="col-xs-12 col-md-4">
							<fieldset class="form-group">
								<label for="price">Price</label>
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="text" class="form-control" id="price" name="price" placeholder="Ex: 2.25" value="<?php if($item) echo $item->price; ?>" aria-label="Amount">
								</div>
							</fieldset>
						</div>
						<div class="col-xs-12 col-md-4">
							<fieldset class="form-group">
								<label for="price_per">Per</label>
								<select class="form-control c-select" id="price_per" name="price_per">
									<option value="lb" <?php if($item && $item->price_per == 'lb') echo 'selected'; ?>>Pound</option>
									<option value="oz" <?php if($item && $item->price_per == 'oz') echo 'selected'; ?>>Ounce</option>
									<option value="ea" <?php if($item && $item->price_per == 'ea') echo 'selected'; ?>>Each</option>
								</select>
							</fieldset>
						</div>
						<div class="col-xs-12 col-md-4">
							<fieldset class="form-group">
								<label for="price_individually">Price Individually?</label>
								<select class="form-control c-select" id="price_individually" name="price_individually">
									<option value="0" <?php if($item && $item->price_individually == 0) echo 'selected'; ?>>No</option>
									<option value="1" <?php if($item && $item->price_individually == 1) echo 'selected'; ?>>Yes</option>
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
									<button type="submit" class="btn btn-primary">Add New Item</button>
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