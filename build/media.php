<?php

include_once('db_connect.php');

$pageTitle = 'Ventura&rsquo;s Surf Brewery - Media';

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
	<div class="photo-bg title-bg media-bg dark-bg parallax">
		<div class="container text-xs-center">
			<div class="title-holder">
				<h1>Media</h1>
			</div>
		</div>
	</div>

	<section class="color-bg angle-top white-bg tastingroomintro">
		<div class="container">
			<h2>Surf Brewery on YouTube</h2>
			<p>Got a couple of minutes to kill?  Our YouTube channel is dedicated to showing you around the brewery, tasting room and home brew shop.  We're always looking for new content ideas, so if you have a suggestion of something you'd like to see, feel free to give us a shout on our <a href="contact">contact page</a>.</p>
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-push-1 col-md-8 col-md-push-2 m-t-1 m-b-2">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="//www.youtube.com/embed/bCDRQZWAzK4?rel=0&showinfo=0&autohide=1&wmode=transparent"></iframe>
					</div>
					<p class="text-xs-center">TappedIn SoCal: Surf Brewery</p>
				</div>
			</div>
			<h3 class="text-xs-center icon icon-inline"><a href="http://www.youtube.com/user/SurfBrewery">Visit the Surf Brewery YouTube channel</a></h3>
		</div>
		<span class="glass-circle img-circle surf">
			<svg viewBox="0 0 68.72 88.81">
			   <use xlink:href="svg/defs.svg#youtube"></use>
			</svg>
		</span>
	</section>

	<section class="photo-bg dark-bg angle-top virtualtour-bg with-text">
		<div class="container">
			<h2>Brewery Virtual Tour</h2>
			<p class="photo-text text-xs-center">Take a 3D virtual tour of our tasting room, homebrew shop, and brew house right on your computer or device.<br>Big thanks to <a href="http://www.divirtualtours.com/">DI Virtual Tours</a> for shooting the brewery.</p>
			<p class="text-xs-center"><a class="btn btn-primary depth-1" href="https://my.matterport.com/show/?m=VPjcWfQ1BZ9">View Tour</a></p>
		</div>
	</section>

	<?php
	$showInstText = true;
	include_once('instagram_feed.php');
	?>
	<section class="photo-bg angle-top grain-bg"></section>
	<?php
	include_once('footer.php');
	include_once('scripts.php');
	?>
</body>
</html>
