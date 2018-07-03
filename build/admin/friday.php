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

				<h2>Friday</h2>

				<p>Prints in the <a href="tastingroom" target="_blank">Tasting Room</a> section of the site, okay to be left blank.</p>

				<a href="admin/edit-<?php echo $currPage; ?>.php?id=01" class="btn btn-primary surf-new-btn">Edit Friday</a>

				<h5 class="m-t-1">Current Text for the Friday section:</h5>

				<p>
				<?php 
				$get_item = $conn->prepare('SELECT * FROM friday ORDER BY id ASC');
				$get_item->execute();

				$item = $get_item->fetch(PDO::FETCH_OBJ);
				if (strlen(trim($item->value))) {
					echo '&ldquo;'.$item->value.'&rdquo;';
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