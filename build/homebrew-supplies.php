<?php

include_once('db_connect.php');

$pageTitle = 'Ventura&rsquo;s Surf Brewery - Ventura Homebrew Shop';

function printShopItem($item, $conn) {
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
	    	echo '<li>'.$item->name.' - '.$item->price.$item->price_per.'</li>';
	    } else {
		    echo '<li>'.$item->name.'</li>';
	    }

	}
	echo '</ul>';
}

?>

<!DOCTYPE html>
<html>
<head>
<?php include_once('head.php'); ?>
</head>
<body>
	<?php
	include_once('browsehappy.php');
	include_once('header.php');
	?>
	<div class="photo-bg title-bg homebrewshop-bg dark-bg parallax">
		<div class="container text-xs-center">
			<div class="title-holder">
				<h1>Homebrew Supplies</h1>
			</div>
		</div>
	</div>
	<section id="beers" class="color-bg angle-top white-bg">
		<div class="container">
			<h2 class="sr-only">Need to buy homebrew supplies in Ventura?</h2>
			<p class="cols">At Surf Brewery we want you to enjoy great beer, whether its ours, one of our fellow micro-brew friends, or your very own. We are proud to make available to our fans a fully stocked home brew shop with everything from all-in-one starter kits, malt extracts, whole and pellet hops, to a full stock of un-milled specialty grains for all levels of home brewers.  Beyond the hardware and software needed to make your own brew, we also offer classes ranging from beginners to advanced all-grain brewers. Can't make it to a class? No problem, we also carry a a wide range of home brewing books and magazines!  Guess what? We have a Facebook page dedicated solely to home brewers just like you. We post info on new ingredients and hardware as they come in stock, homebrew contests, and good old fashion beer talk! <a href="https://www.facebook.com/surfhomebrew" target="_blank">Click here</a> to check it out!</p>
		</div>
		<span class="glass-circle img-circle surf">
			<svg viewBox="0 0 68.72 88.81">
			   <use xlink:href="svg/defs.svg#logo"></use>
			</svg>
		</span>
	</section>
	<section class="color-bg angle-top primary-bg">
		<div class="container">
			<h2>Homebrew Shop Hours of Operation</h2>
			<p>The home brew shop at Surf Brewery is open the same hours as the tasting room.  So grab a pint at the bar, then browse our wares while you create the perfect recipe!</p>

			<?php
				$get_hours = $conn->prepare('SELECT * FROM hours ORDER BY id ASC LIMIT 1');
				$get_hours->execute();

				$hours = $get_hours->fetch(PDO::FETCH_OBJ);

				if ($hours->note) {
					?>
					<p><?php echo $hours->note; ?></p>
					<?php
				}
			?>
			<div class="col-sm-6 col-md-5 col-md-offset-1 tastingroom-hours">
				<span class="day">Monday</span><span class="hours"><?php echo ($hours->mo_o == $hours->mo_c ? $hours->mo_o : $hours->mo_o.' - '.$hours->mo_c); ?></span>
				<span class="day">Tuesday</span><span class="hours"><?php echo ($hours->tu_o == $hours->tu_c ? $hours->tu_o : $hours->tu_o.' - '.$hours->tu_c); ?></span>
				<span class="day">Wednesday</span><span class="hours"><?php echo ($hours->we_o == $hours->we_c ? $hours->we_o : $hours->we_o.' - '.$hours->we_c); ?></span>
				<span class="day">Thursday</span><span class="hours"><?php echo ($hours->th_o == $hours->th_c ? $hours->th_o : $hours->th_o.' - '.$hours->th_c); ?></span>
			</div>
			<div class="col-sm-6 col-md-5 tastingroom-hours">
				<span class="day">Friday</span><span class="hours"><?php echo ($hours->fr_o == $hours->fr_c ? $hours->fr_o : $hours->fr_o.' - '.$hours->fr_c); ?></span>
				<span class="day">Saturday</span><span class="hours"><?php echo ($hours->sa_o == $hours->sa_c ? $hours->sa_o : $hours->sa_o.' - '.$hours->sa_c); ?></span>
				<span class="day">Sunday</span><span class="hours"><?php echo ($hours->su_o == $hours->su_c ? $hours->su_o : $hours->su_o.' - '.$hours->su_c); ?></span>
			</div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 20 20">
			   <use xlink:href="svg/defs.svg#clock"></use>
			</svg>
		</span>
	</section>

	<section class="color-bg angle-top secondary-bg shop-list">
		<div class="container">
			<h2>Homebrew Ingredient List</h2>
			<p><em>Shop list was last updated on <?php
				$get_listdate = $conn->prepare('SELECT date_modified FROM shop ORDER BY date_modified DESC LIMIT 1');
				$get_listdate->execute();
				$listdate = $get_listdate->fetch(PDO::FETCH_OBJ);
				echo date("F j, Y", strtotime($listdate->date_modified));
			?></em></p>

			<h3 class="icon"><svg viewBox="0 0 65 175.5"><use xlink:href="svg/defs.svg#barley"></use></svg> Grains</h3>
			<?php printShopItem('grain', $conn); ?>

			<h3 class="icon"><svg viewBox="0 0 93.883 120.885"><use xlink:href="svg/defs.svg#hops"></use></svg> Hops</h3>
			<?php printShopItem('hops', $conn); ?>

			<h3 class="icon"><svg viewBox="0 0 102.2 102.2"><use xlink:href="svg/defs.svg#yeast"></use></svg> Yeast</h3>
			<?php printShopItem('yeast', $conn); ?>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 65 175.5">
			   <use xlink:href="svg/defs.svg#barley"></use>
			</svg>
		</span>
	</section>

	<section class="color-bg angle-top black-bg">
		<div class="container">
			<h2>Homebrew Classes</h2>
			<p>Are you interested in brewing at home but dont know where to start?  Our homebrew classes are just the ticket.  We offer beginning and advanced classes taught right in our brewery. Call now to reserve a spot!</p>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 homebrewclasses">
					<?php
						$get_classes = $conn->prepare('SELECT * FROM classes WHERE date >= CURDATE() ORDER BY date ASC');
						$get_classes->execute();

						$count = $get_classes->rowCount();

						if ($count == 0) {
					?>
						<p class="text-center">We dont have any classes on the calendar at the moment, but keep an eye out here or follow our <a href="http://www.facebook.com/surfbrewery" target="_blank">Homebrew Facebook</a> group where we will always post upcoming classes as well.</p>
					<?php
						} else {
					?>
						<p>Below is the list of homebrew classes currently on the calendar.  Give us a call if you dont see the class thats right for you.</p>
					<?php
							while($class = $get_classes->fetch(PDO::FETCH_OBJ)){
					?>
						<div class="event">
							<h3 class="name icon"><svg viewBox="0 0 18 20"><use xlink:href="svg/defs.svg#event"></use></svg> <?php echo $class->name; ?></h3>
							<p class="place-date">
								<strong>
									On <time datetime="<?php echo $class->date; ?>"><?php echo date("F j", strtotime($class->date)); ?> from <?php echo $class->time; ?></time>
								</strong>
							</p>
						</div>
					<?php
							}
					    }
					?>
					<ul class="striped m-a-0 p-a-0">

					</ul>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 22 18">
			   <use xlink:href="svg/defs.svg#learn"></use>
			</svg>
		</span>
	</section>
	<?php include_once('instagram_feed.php'); ?>
	<section class="photo-bg angle-top grains-bg"></section>
	<?php
	include_once('footer.php');
	include_once('scripts.php');
	?>
</body>
</html>
