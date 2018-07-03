<?php

include_once('db_connect.php');

$pageTitle = 'Ventura&rsquo;s Surf Brewery - Home Page';
$pageDescription = 'ASDF';

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
	<main>
		<section class="color-bg angle-top primary-bg m-t-2">
			<div class="container m-t-2">
				<h1>Oops! Sorry but that page wasn't found!</h1>

				<p>
					A 404?  Well this is embarassing... tell you what, take a look at the pages below, perhaps what you're looking for can be found there!
				</p>

				<dl>
					<dt><a href="index">Home</a></dt>
					<dd>It's the home page for Surf Brewery!</dd>
					<dt><a href="beer">Beer</a></dt>
					<dd>Read about the beer that we currently have at the brewery, on draft in kegs or in bottles at your local beer-ster.</dd>
					<dt><a href="events">Events</a></dt>
					<dd>Check here to see if we have any events coming up, also a repository for news articles about the brewery.</dd>
					<dt><a href="tastingroom">Tasting Room</a></dt>
					<dd>Our on-site tasting room is a great place to hang out and enjoy a beer.  Find out about pricing, clubs, entertainment and food.</dd>
					<dt><a href="tastingroom">Surf Travel</a></dt>
					<dd>Trying to find Surf Brewery beer around southern California?  Look no further!</dd>
					<dt><a href="homebrew-supplies">Homebrew Shop</a></dt>
					<dd>Not many breweries sell you beer, as well as the equipment and ingredients to make your own beer... but we do!</dd>
					<dt><a href="http://scientificseries.com/">Barrels</a></dt>
					<dd>Scientific Series is our sour and barrel aged program, check it out for some one of a kind brews.</dd>
					<dt><a href="http://surfbrewery.3dcartstores.com/">Surf Accessories</a></dt>
					<dd>Grab a shirt and a pint glass as well as many other Surf Brewery accessories.</dd>
					<dt><a href="contact">Contact</a></dt>
					<dd>If you need to get a hold of us for any reason, get our address phone number or contact us via email here.</dd>
				</dl>
			</div>
		</section>
	</main>
	<?php include_once('footer.php'); ?>
	<?php include_once('scripts.php'); ?>
</body>
</html>
