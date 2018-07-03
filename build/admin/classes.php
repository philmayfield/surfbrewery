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

				<h2>Classes</h2>

				<p>Prints in the <a href="homebrew-supplies" target="_blank">Homebrew</a> section of the site, if no future classes have been input a message will display directing users to the Homebrew Facebook page.</p>

				<a href="admin/edit-<?php echo $currPage; ?>.php?id=new" class="btn btn-primary surf-new-btn">Add Class</a>

				<div class="row">

					<div class="surf-list-holder col-xs-12 col-lg-6">

						<ul class="surf-list">
				
							<?php 
							$get_items = $conn->prepare('SELECT * FROM classes ORDER BY date DESC');
							$get_items->execute();

							$count = $get_items->rowCount();
							$first_half = ceil($count/2);
							$item_count = 1;

							while($item = $get_items->fetch(PDO::FETCH_OBJ)){
							?>

							<li class="surf-list-item">
								<a href="admin/edit-<?php echo $currPage; ?>.php?id=<?php echo $item->id; ?>">
									<b><?php echo $item->name;?></b> - <time datetime="<?php echo $item->date; ?>"><?php echo date("F j, Y", strtotime($item->date)); ?></time>
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