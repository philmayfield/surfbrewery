<header class="container m-y-2">
	<?php 
	if(!empty($_GET['m'])){
		echo '<div class="alert alert-danger">';
		switch ($_GET['m']) {
			case 'ac':
				echo 'You dont have access to that page.';
				break;
			case 'lo':
				echo 'You have been logged out.';
				break;
			default:
				echo $_GET['m'];
				break;
		}
		echo '</div>';
	}
	?>
	<h1 class="m-y-2">Surf Brewery Admin</h1>
	<?php include_once('nav.php');?>
</header>