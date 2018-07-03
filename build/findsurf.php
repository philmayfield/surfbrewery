<?php

include_once('db_connect.php');

$pageTitle = 'Ventura&rsquo;s Surf Brewery - Find Surf Brewery Beer';

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
	<div class="photo-bg title-bg travel-bg dark-bg parallax">
		<div class="container text-xs-center">
			<div class="title-holder">
				<h1>Surf Travel</h1>
			</div>
		</div>
	</div>
	<section class="color-bg angle-top white-bg">
		<div class="container">
			<h2>Where to find Surf Brewery beer</h2>
			<p>After more than five years in existence, our beer can now be found throughout California, however it is ever more difficult to track exactly where Surf beer is at specifically. On draft with the ever more common rotating tap handle, it can be a hit or miss. Here are a few guidelines to help you find Surf in your travels: Enjoy the Surf, Enjoy the Flavor!</p>

			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<hr class="icon">
					<span class="glass-circle img-circle divider">
						<svg viewBox="0 0 93.883 120.885">
						   <use xlink:href="svg/defs.svg#hops"></use>
						</svg>
					</span>
					<p>In our backyard, Ventura and Ventura County you will find our 22oz bottles at most Vons, Albertsons, Costco, Whole Foods, Total Wine and More and many other smaller bottle shops. On draft at many local restaurants and bars. Beyond our backyard, try Whole Foods, Total Wine and More, and quality craft bottle shops. Mondos&trade; Blonde Ale is now available in easy to transport and convenient 6 pack cans.  Perfect for taking to your favorite surf beach.  At restaurants, ask your server or bartender when they might be getting Surf on tap.</p>
					<hr class="icon">
					<span class="glass-circle img-circle divider">
						<svg viewBox="0 0 24 19.495">
						   <use xlink:href="svg/defs.svg#twitter"></use>
						</svg>
					</span>
					<p>Follow our social media accounts, where we constantly post up to date locations that are currently serving or selling Surf Brewery beer. <a href="https://www.instagram.com/surfbrewery/" target="_blank">Instagram</a>, <a href="https://twitter.com/surfbrewery" target="_blank">Twitter</a>, <a href="http://www.facebook.com/surfbrewery" target="_blank">Facebook</a>.</p>
					<p>Or for a specific City, <a href="contact">send us an email</a> and we'll give you a hand finding the closest location.</p>
					<hr class="icon">
					<span class="glass-circle img-circle divider">
						<svg viewBox="0 0 14 20">
						   <use xlink:href="svg/defs.svg#location"></use>
						</svg>
					</span>
					<p>Of course Surf Brewery beer is also available by the glass, growler, bottle and can in our tasting room, on-site at the brewery.  If you're in the Ventura area, be sure to stop by! <br><a href="https://www.google.com/maps/place/Surf+Brewery/@34.25786,-119.231163,15z/data=!4m2!3m1!1s0x0:0xbea75e53a78c8b96" target="_blank">Get directions to Surf Brewery on Google Maps</a></p>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle surf">
			<svg viewBox="0 0 68.72 88.81">
			   <use xlink:href="svg/defs.svg#logo"></use>
			</svg>
		</span>
	</section>
	<?php include_once('instagram_feed.php'); ?>
	<section class="color-bg angle-top secondary-bg less-padding">
		<?php include_once('twitter_feed.php'); ?>
		<span class="glass-circle img-circle">
			<a href="https://twitter.com/surfbrewery" target="_blank">
				<svg viewBox="0 0 24 19.495">
				   <use xlink:href="svg/defs.svg#twitter"></use>
				</svg>
			</a>
		</span>
	</section>
	<section class="photo-bg angle-top pints-bg"></section>
	<?php
	include_once('footer.php');
	include_once('scripts.php');
	?>
</body>
</html>
