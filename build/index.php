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
		<div class="photo-bg slide parallax main-bg dark-bg">
			<div class="container">
				<div class="text-xs-center">
					<svg viewBox="0 0 307.07 409.28" roll="img" aria-label="Surf Brewery - Ventura, CA">
					   <use xlink:href="svg/defs.svg#logo_full_light"></use>
					</svg>
					<ul class="list-unstyled soc-links m-t-3">
						<li>
							<a href="https://www.instagram.com/surfbrewery/">
								<span class="sr-only">Ventura&rsquo;s Surf Brewery on Instagram</span>
								<svg viewBox="0 0 97.395 97.395">
								   <use xlink:href="svg/defs.svg#instagram"></use>
								</svg>
							</a>
						</li><li>
							<a href="https://twitter.com/surfbrewery">
								<span class="sr-only">Ventura&rsquo;s Surf Brewery on Twitter</span>
								<svg viewBox="0 0 24 19.495">
								   <use xlink:href="svg/defs.svg#twitter"></use>
								</svg>
							</a>
						</li><li>
							<a href="http://www.facebook.com/surfbrewery">
								<span class="sr-only">Ventura&rsquo;s Surf Brewery on Facebook</span>
								<svg viewBox="0 0 90 90">
								   <use xlink:href="svg/defs.svg#facebook"></use>
								</svg>
							</a>
						</li><li>
							<a href="http://www.youtube.com/user/SurfBrewery">
								<span class="sr-only">Ventura&rsquo;s Surf Brewery on Youtube</span>
								<svg viewBox="0 0 24 16.883">
								   <use xlink:href="svg/defs.svg#youtube"></use>
								</svg>
							</a>
						</li><li>
							<a href="https://www.google.com/maps/place/Surf+Brewery/@34.25786,-119.231163,15z/data=!4m2!3m1!1s0x0:0xbea75e53a78c8b96">
								<span class="sr-only">Ventura&rsquo;s Surf Brewery on Google Maps</span>
								<svg viewBox="0 0 14 20">
									<use xlink:href="svg/defs.svg#location"></use>
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<section class="color-bg angle-top white-bg less-padding">
			<div class="container">
				<h1>The Story of Ventura&rsquo;s Surf Brewery</h1>

				<div class="cols">
					<p>In modern times, Surf Brewery® was the first packaging craft microbrewery in Ventura County CA, when opened June 2011.  We continue the small business support and service by self distributing our kegs and bottles in Ventura County. We want to continue the great tradition of California breweries.  Like Adam Schuppert Brewery, the first in California started in 1849, Anchor Brewering Co., considered the first craft beer in America and the New Albion Brewery, considered the first microbrewery in the United States. We strongly believe California beer is the best in the World!</p>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-push-1 col-md-8 col-md-push-2 m-t-1 m-b-2">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XHTLjlRfFkc?rel=0&showinfo=0&autohide=1&wmode=transparent"></iframe>
						</div>
					</div>
				</div>
				<div class="cols">
				    <p>Surf brewery, located in an industrial park on Market Street in Ventura, has a large Tasting Room with seating for 75 for tasting the fresh brew. Samplers and pints are available on site, with keg, bottle and Growlers available for take-away. For the young groms, we have sodasand Lori’s Local Lemonade.  Although we don’t serve food, this allows us to focus on the beer; we have a local gourmet food truck every night we are open.  Although we don’t serve food, this allows us to focus on the beer; you can BYOF-Bring Your Own Food, into the Tasting Room. Also, Tuesday through Sunday, we have local gourmet food trucks in our parking lot.</p>

				    <p>The décor of the brewery is a combination surf &amp; beer museum. Ventura/Oxnard local surf history; Morey-Pope, Campbell Bros, Walden, &amp; William Dennis surfboards. Surf videos and movies, playing constantly on the big screen TVs. History of California Beer as well as current memorabilia is displayed. Saturday evenings we have live music starting at 6pm.  Visit the bottom of the <a href="tastingroom.html">Tasting Room</a> page to see who is playing.</p>

				    <p>Did we mention our fully stocked Homebrew Shop within the brewery, www.surfhomebrew.com. We are also very involved with the local Homebrew Club called VIBE (Ventura Independent Beer Enthusiasts). We strongly support the creative hobby of Home brewing, made legal in 1978! No more long drives to pick up your homebrew ingredients!</p>

				    <p>To support the efforts that <a href="http://surfrider.org/ventura/">Surfrider Foundation</a> is doing at Surfer’s Point, we target 1% of total sales donated for this local effort.</p>
			    </div>
			</div>
			<span class="glass-circle img-circle surf">
				<svg viewBox="0 0 68.72 88.81">
				   <use xlink:href="svg/defs.svg#logo"></use>
				</svg>
			</span>
		</section>
		<section class="photo-bg dark-bg angle-top virtualtour-bg with-text with-icon">
			<div class="container">
				<h2>Surf Brewery 3D Tour</h2>
				<p class="photo-text text-xs-center">Take a 3D virtual tour of our tasting room, homebrew shop, and brew house right on your computer or mobile device.<br>Big thanks to <a href="http://www.divirtualtours.com/">DI Virtual Tours</a> for shooting the brewery.</p>
				<p class="text-xs-center"><a class="btn btn-primary depth-1" href="https://my.matterport.com/show/?m=VPjcWfQ1BZ9">View Tour</a></p>
			</div>
			<span class="glass-circle img-circle">
				<svg viewBox="0 0 24 24">
				   <use xlink:href="svg/defs.svg#3d"></use>
				</svg>
			</span>
		</section>
		<?php include_once('instagram_feed.php'); ?>
		<section class="color-bg angle-top secondary-bg less-padding">
			<?php include_once('twitter_feed.php'); ?>
			<span class="glass-circle img-circle">
				<a href="https://twitter.com/surfbrewery">
					<svg viewBox="0 0 24 19.495">
					   <use xlink:href="svg/defs.svg#twitter"></use>
					</svg>
				</a>
			</span>
		</section>
		<section class="photo-bg angle-top satellite-bg"></section>
	</main>
	<?php include_once('footer.php'); ?>
	<?php include_once('scripts.php'); ?>
</body>
</html>
