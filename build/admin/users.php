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

				<h2>Users</h2>

				<p>This is the list of user accounts who have access to this Admin control panel, and which sections they have permission to edit.</p>

				<a href="admin/edit-<?php echo $currPage; ?>.php?id=new" class="btn btn-primary surf-new-btn">Add a New User</a>

				<div class="row">

					<div class="surf-list-holder col-xs-12 col-lg-6">

						<ul class="surf-list">
				
							<?php 
							$get_items = $conn->prepare('SELECT * FROM users ORDER BY login ASC');
							$get_items->execute();

							$count = $get_items->rowCount();
							$first_half = ceil($count/2);
							$item_count = 1;

							while($item = $get_items->fetch(PDO::FETCH_OBJ)){
							?>

							<li class="surf-list-item">
								<a href="admin/edit-<?php echo $currPage; ?>.php?id=<?php echo $item->id; ?>">
									<b><?php echo $item->login;?></b>
								</a>
							</li>

							<?php 
								if ($item_count == $first_half) {
									?>
										</ul>
									</div>
									<div class="surf-list-holder col-xs-12 col-lg-6">
										<ul class="surf-list">
									<?php
								}
								$item_count++;
							}
							?>

						</ul>

					</div>

				</div>

			</section>

		</main>

	<?php include_once('scripts.php'); ?>

	</body>

</html>

<?php

$conn = null; // Close connection

?>