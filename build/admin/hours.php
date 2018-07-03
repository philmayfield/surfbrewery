<?php

session_start();

require_once('../db_connect.php'); // Sets up $conn
require_once('login_test.php'); // requires session_start(), sets up $logged_in, $user, $userdata;


?>

<!DOCTYPE html>
<html class="no-js">
    <?php include_once('head.php'); ?>
    <body>

		<?php include_once('header.php'); ?>

    	<main class="container m-y-2">

			<section class="card card-block">

				<h2>Hours</h2>

				<p>Prints in multiple places across the site, anywhere hours are listed come from the same source.  The Note field is optional and can be left blank.</p>

				<a href="admin/edit-<?php echo $currPage; ?>.php?id=01" class="btn btn-primary surf-new-btn">Edit Hours</a>

				<div class="row">

					<div class="surf-list-holder col-xs-12 col-lg-6">

						<ul class="surf-list">
				
							<?php 
							$get_items = $conn->prepare('SELECT * FROM hours ORDER BY id ASC');
							$get_items->execute();

							$item = $get_items->fetch(PDO::FETCH_OBJ);
							?>

							<li class="surf-list-item">
								<b>Monday</b> 
								<?php 
								if ($item->mo_o == $item->mo_c) {
									echo $item->mo_o;
								} else {
									echo $item->mo_o.'-'.$item->mo_c;
								}
								?>
							</li>

							<li class="surf-list-item">
								<b>Tuesday</b> 
								<?php 
								if ($item->tu_o == $item->tu_c) {
									echo $item->tu_o;
								} else {
									echo $item->tu_o.'-'.$item->tu_c;
								}
								?>
							</li>

							<li class="surf-list-item">
								<b>Wednesday</b> 
								<?php 
								if ($item->we_o == $item->we_c) {
									echo $item->we_o;
								} else {
									echo $item->we_o.'-'.$item->we_c;
								}
								?>
							</li>

							<li class="surf-list-item">
								<b>Thursday</b> 
								<?php 
								if ($item->th_o == $item->th_c) {
									echo $item->th_o;
								} else {
									echo $item->th_o.'-'.$item->th_c;
								}
								?>
							</li>

						</ul>

					</div>

					<div class="surf-list-holder col-xs-12 col-lg-6">

						<ul class="surf-list">

							<li class="surf-list-item">
								<b>Friday</b> 
								<?php 
								if ($item->fr_o == $item->fr_c) {
									echo $item->fr_o;
								} else {
									echo $item->fr_o.'-'.$item->fr_c;
								}
								?>
							</li>

							<li class="surf-list-item">
								<b>Saturday</b> 
								<?php 
								if ($item->sa_o == $item->sa_c) {
									echo $item->sa_o;
								} else {
									echo $item->sa_o.'-'.$item->sa_c;
								}
								?>
							</li>

							<li class="surf-list-item">
								<b>Sunday</b> 
								<?php 
								if ($item->su_o == $item->su_c) {
									echo $item->su_o;
								} else {
									echo $item->su_o.'-'.$item->su_c;
								}
								?>
							</li>


						</ul>

					</div>

				</div>

				<h5>Hours Note Text</h5>
				<p>
					<?php 
					if (strlen(trim($item->note))) {
						echo $item->note;
					} else {
						echo 'No text has been input, and nothing will print on the webpage.';
					}
					?>
				</p>

			</section>

		</main>

	<?php include_once('scripts.php'); ?>

	</body>

</html>

<?php

$conn = null; // Close connection

?>