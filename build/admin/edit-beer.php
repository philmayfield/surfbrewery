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

				<h2><?php echo $item ? 'Editing '.$item->name : 'Adding New Beer'; ?></h2>

				<form id="update-form" action="admin/db_interface.php" method="post" enctype="multipart/form-data">

					<?php include_once('edit-form-setup.php'); ?>

					<div class="row">
						
						<div class="col-xs-12 col-md-8">
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<fieldset class="form-group">
										<label for="name">Beer Name</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="Ex: Mondos" value="<?php if($item) echo $item->name; ?>" required>
									</fieldset>
								</div>
								<div class="col-xs-12 col-md-6">
									<fieldset class="form-group">
										<label for="style">Beer Style</label>
										<input type="text" class="form-control" id="style" name="style" placeholder="Ex: Pale Ale" value="<?php if($item) echo $item->style; ?>" required>
									</fieldset>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12 col-md-4 field-surf">
									<fieldset class="form-group">
										<label for="label">Label Color</label>
										<input type='color' class="form-control" id="label" name='label' value='<?php echo $item ? $item->label : '#437bc3'; ?>' />
									</fieldset>

								</div>
								<div class="col-xs-12 col-md-4 field-surf">
									<fieldset class="form-group">
										<label for="ltd">Limited?</label>
										<select class="form-control c-select" id="ltd" name="ltd">
											<option value="0" <?php if($item && $item->ltd == 0) echo 'selected'; ?>>No</option>
											<option value="1" <?php if($item && $item->ltd == 1) echo 'selected'; ?>>Yes</option>
										</select>
									</fieldset>
								</div>
								<div class="col-xs-12 col-md-8 field-sci hidden">
									<fieldset class="form-group">
										<label for="availability">Availability</label>
										<input type="text" class="form-control" id="availability" name="availability" placeholder="Ex: Christmas 2016" value="<?php if($item) echo $item->availability; ?>">
									</fieldset>
								</div>
								<div class="col-xs-12 col-md-4">
									<fieldset class="form-group">
										<label for="award">Awarded?</label>
										<select class="form-control c-select" id="award" name="award">
											<option value="" <?php if($item && $item->award == '') echo 'selected'; ?>>No</option>
											<option value="b" <?php if($item && $item->award == 'b') echo 'selected'; ?>>Bronze</option>
											<option value="s" <?php if($item && $item->award == 's') echo 'selected'; ?>>Silver</option>
											<option value="g" <?php if($item && $item->award == 'g') echo 'selected'; ?>>Gold</option>
										</select>
									</fieldset>
								</div>
							</div>

							<fieldset class="form-group">
								<label for="description">Beer Description</label>
								<textarea class="form-control" id="description" name="description" rows="4" placeholder="Description"><?php if($item) echo $item->description; ?></textarea>
							</fieldset>

							<fieldset class="form-group beer-icon-color">
								<legend>Beer Icon Color</legend>
								<input type="radio" name="icon" id="icon01" value="01" <?php if(($item && $item->icon == 01) || !$item) echo 'checked'; ?>>
								<label for="icon01" class="radio-inline icon-color srm01"></label>
								<input type="radio" name="icon" id="icon05" value="05" <?php if($item && $item->icon == 05) echo 'checked'; ?>>
								<label for="icon05" class="radio-inline icon-color srm05"></label>
								<input type="radio" name="icon" id="icon10" value="10" <?php if($item && $item->icon == 10) echo 'checked'; ?>>
								<label for="icon10" class="radio-inline icon-color srm10"></label>
								<input type="radio" name="icon" id="icon15" value="15" <?php if($item && $item->icon == 15) echo 'checked'; ?>>
								<label for="icon15" class="radio-inline icon-color srm15"></label>
								<input type="radio" name="icon" id="icon20" value="20" <?php if($item && $item->icon == 20) echo 'checked'; ?>>
								<label for="icon20" class="radio-inline icon-color srm20"></label>
								<input type="radio" name="icon" id="icon25" value="25" <?php if($item && $item->icon == 25) echo 'checked'; ?>>
								<label for="icon25" class="radio-inline icon-color srm25"></label>
								<input type="radio" name="icon" id="icon30" value="30" <?php if($item && $item->icon == 30) echo 'checked'; ?>>
								<label for="icon30" class="radio-inline icon-color srm30"></label>
								<input type="radio" name="icon" id="icon35" value="35" <?php if($item && $item->icon == 35) echo 'checked'; ?>>
								<label for="icon35" class="radio-inline icon-color srm35"></label>
								<input type="radio" name="icon" id="icon40" value="40" <?php if($item && $item->icon == 40) echo 'checked'; ?>>
								<label for="icon40" class="radio-inline icon-color srm40"></label>
								<input type="radio" name="icon" id="icon45" value="45" <?php if($item && $item->icon == 45) echo 'checked'; ?>>
								<label for="icon45" class="radio-inline icon-color srm45"></label>
								<input type="radio" name="icon" id="icon50" value="50" <?php if($item && $item->icon == 50) echo 'checked'; ?>>
								<label for="icon50" class="radio-inline icon-color srm50"></label>
								<input type="radio" name="icon" id="icon55" value="55" <?php if($item && $item->icon == 55) echo 'checked'; ?>>
								<label for="icon55" class="radio-inline icon-color srm55"></label>
								<input type="radio" name="icon" id="icon60" value="60" <?php if($item && $item->icon == 60) echo 'checked'; ?>>
								<label for="icon60" class="radio-inline icon-color srm60"></label>
							</fieldset>

						</div>
						<div class="col-xs-12 col-md-4">

							<fieldset class="form-group">
								<label for="brand">Brand</label>
								<select class="form-control c-select" id="brand" name="brand">
									<option value="0" <?php if($item && $item->brand == 0) echo 'selected'; ?>>Surf Brewery</option>
									<option value="1" <?php if($item && $item->brand == 1) echo 'selected'; ?>>Scientific Series</option>
								</select>
							</fieldset>

							<fieldset class="form-group">
								<label for="published">Published?</label>
								<select class="form-control c-select" id="published" name="published">
									<option value="0" <?php if($item && $item->published == 0) echo 'selected'; ?>>No</option>
									<option value="1" <?php if($item && $item->published == 1) echo 'selected'; ?>>Yes</option>
								</select>
							</fieldset>

							

							<div class="row">
								<div class="col-xs-6 col-md-12 col-lg-6">

									<fieldset class="form-group field-sci hidden">
										<label for="process">In Process?</label>
										<select class="form-control c-select" id="process" name="process">
											<option value="0" <?php if($item && $item->process == 0) echo 'selected'; ?>>No</option>
											<option value="1" <?php if($item && $item->process == 1) echo 'selected'; ?>>Yes</option>
										</select>
									</fieldset>

									<fieldset class="form-group">
										<label for="plato">Plato</label>
										<input type="text" class="form-control" id="plato" name="plato" placeholder="Ex: 15.0" value="<?php if($item) echo $item->plato; ?>">
									</fieldset>

									<fieldset class="form-group">
										<label for="ibu">IBU</label>
										<input type="text" class="form-control" id="ibu" name="ibu" placeholder="Ex: 50" value="<?php if($item) echo $item->ibu; ?>">
									</fieldset>

									<fieldset class="form-group field-surf">
										<label for="kegSM">&frac16; bbl Price</label>
										<div class="input-group">
											<span class="input-group-addon">$</span>
											<input type="text" class="form-control" id="kegSM" name="kegSM" placeholder="Ex: 75.00" value="<?php if($item) echo $item->kegSM; ?>" aria-label="Amount">
										</div>
									</fieldset>

								</div>
								<div class="col-xs-6 col-md-12 col-lg-6">

									<fieldset class="form-group field-sci hidden">
										<label for="archived">Archived?</label>
										<select class="form-control c-select" id="archived" name="archived">
											<option value="0" <?php if($item && $item->archived == 0) echo 'selected'; ?>>No</option>
											<option value="1" <?php if($item && $item->archived == 1) echo 'selected'; ?>>Yes</option>
										</select>
									</fieldset>

									<fieldset class="form-group">
										<label for="srm">SRM</label>
										<input type="text" class="form-control" id="srm" name="srm" placeholder="Ex: 37.0" value="<?php if($item) echo $item->srm; ?>">
									</fieldset>

									<fieldset class="form-group">
										<label for="abv">ABV</label>
										<input type="text" class="form-control" id="abv" name="abv" placeholder="Ex: 5.3" value="<?php if($item) echo $item->abv; ?>">
									</fieldset>

									<fieldset class="form-group field-surf">
										<label for="kegLG">&frac12; bbl Price</label>
										<div class="input-group">
											<span class="input-group-addon">$</span>
											<input type="text" class="form-control" id="kegLG" name="kegLG" placeholder="Ex: 155.00" value="<?php if($item) echo $item->kegLG; ?>" aria-label="Amount">
										</div>
									</fieldset>

								</div>
							</div>

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
									<button type="submit" class="btn btn-primary">Add New Beer</button>
									<?php
								}
							?>
						</div>
					</div>

				</form>

			</section>

		</main>

	<link rel='stylesheet' href='css/spectrum.css' />
	<?php include_once('scripts.php'); ?>
	<script src="js/spectrum.js"></script>

	</body>

</html>

<?php

$conn = null; // Close connection

?>