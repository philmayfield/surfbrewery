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

				<h2>Hop Rocket</h2>

				<p>Prints in the <a href="beer" target="_blank">Beer</a> section of the site, okay to be left blank.</p>

				<a href="admin/edit-<?php echo $currPage; ?>.php?id=01" class="btn btn-primary surf-new-btn">Edit Hop Rocket</a>

				<h5 class="m-t-1">Current Text for the Hop Rocket section:</h5>

				<p>&ldquo;
				<?php 
				$get_item = $conn->prepare('SELECT * FROM hoprocket ORDER BY id ASC');
				$get_item->execute();

				$item = $get_item->fetch(PDO::FETCH_OBJ);
				if (strlen(trim($item->value))) {
					echo $item->value;
				} else {
					echo 'No text has been input, and nothing will print on the webpage.';
				}
				?>
				&rdquo;</p>

			</section>

		</main>

	<?php include_once('scripts.php'); ?>

	</body>

</html>

<?php

$conn = null; // Close connection

?>