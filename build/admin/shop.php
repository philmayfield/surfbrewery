<?php

session_start();

require_once('../db_connect.php'); // Sets up $conn
require_once('login_test.php'); // requires session_start(), sets up $logged_in, $user, $userdata;

function printShopItem($item, $conn, $currPage) {
	$get_items = $conn->prepare('SELECT * FROM `shop` WHERE `type` = "'.$item.'" ORDER BY `group` ASC, `price_individually` ASC, `name` ASC');
	$get_items->execute();

	$ogroup = '';
	$pgroup = false;
	$pi = 0;
	$gi = 0;

	while ($item = $get_items->fetch(PDO::FETCH_OBJ)) {
	    
	    if ($item->group !== $ogroup && $item->price_individually !== 1) {
	        $ogroup = $item->group;
	        
	        if ($gi > 0) {
	            echo '</ul>';
	        }
	        echo '<h4 class="shop-group">'.$ogroup.' - $'.$item->price.$item->price_per.'</h4>';
	        echo '<ul class="cols cols-sm-2 cols-lg-3 clearfix">';
	        $gi++;
	        $pgroup = false;
	        $pi = 0;
	    }

	    if ($item->price_individually == 1) {
	    	$pgroup = true;

	    	if ($pi == 0) {
	            echo '</ul>';
		        echo '<h4 class="shop-group">'.$ogroup.' - <small>Priced Individually</small></h4>';
		        echo '<ul class="cols cols-sm-2 cols-lg-3 clearfix">';
	        }
	    	$pi++;
	    }

	    if ($pgroup) {
	    	echo '<li><a href="admin/edit-'.$currPage.'.php?id='.$item->id.'">'.$item->name.' - '.$item->price.$item->price_per.'</a></li>';
	    } else {
		    echo '<li><a href="admin/edit-'.$currPage.'.php?id='.$item->id.'">'.$item->name.'</a></li>';
	    }
	    

	}
	echo '</ul>';
}

?>

<!DOCTYPE html>
<html class="no-js">
    <?php include_once('head.php'); ?>
    <body>

		<?php include_once('header.php'); ?>

    	<main class="container m-y-2">

			<section class="card card-block">

				<h2>Shop</h2>

				<p>Prints in the <a href="homebrew-supplies" target="_blank">Homebrew</a> section of the site.</p>

				<a href="admin/edit-<?php echo $currPage; ?>.php?id=new" class="btn btn-primary surf-new-btn">Add a New Item</a>

				<h3 class="m-t-1">Grains</h3>
				<?php printShopItem('grain', $conn, $currPage); ?>

				<h3>Hops</h3>
				<?php printShopItem('hops', $conn, $currPage); ?>

				<h3>Yeast</h3>
				<?php printShopItem('yeast', $conn, $currPage); ?>

			</section>

		</main>

	<?php include_once('scripts.php'); ?>

	</body>

</html>

<?php

$conn = null; // Close connection

?>