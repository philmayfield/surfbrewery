<?php

$m = null;

session_start();

if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0 ) {
	$m = 'err';
	$errmsg = '';
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		$errmsg .= $msg;
	}
	unset($_SESSION['ERRMSG_ARR']);
}

if(!empty($_GET['m'])){
	$m = $_GET['m'];
}

?>

<!DOCTYPE html>
<html class="no-js">
    <?php include_once('head.php'); ?>
    <body>

    	<main class="container p-t-2">

			<?php
			if($m){
				echo '<div class="alert alert-danger">';
				switch ($m) {
					case 'li':
						echo 'You need to log in.';
						break;
					case 'lo':
						echo 'You have been logged out.';
						break;
					case 'err':
						echo $errmsg;
						break;
				}
				echo '</div>';
			}
			?>

			<h1 class="text-xs-center p-y-2">Surf Brewery Admin</h1>

			<section class="card card-block col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
				<h2>Login</h2>
				<form action="admin/reg.php" method="POST">
					<div class="form-group">
					<label class="sr-only" for="uname">Username</label>
						<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter username">
					</div>
					<div class="form-group">
						<label class="sr-only" for="pword">Password</label>
						<input type="password" class="form-control" id="pword" name="pword" placeholder="Password">
					</div>
					<div class="text-xs-right">
						<button type="submit" class="btn btn-primary">Sign in</button>
					</div>
				</form>
				<div id="form-msg"></div>
			</section>
			
		</main>

	</body>

</html>