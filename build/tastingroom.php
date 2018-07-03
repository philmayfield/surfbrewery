<?php

include_once('db_connect.php');

$pageTitle = 'Ventura&rsquo;s Surf Brewery - Ventura Tasting Room';

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
	<div class="photo-bg title-bg tastingroom-bg dark-bg parallax">
		<div class="container text-xs-center">
			<div class="title-holder">
				<h1>Tasting Room</h1>
			</div>
		</div>
	</div>
	<section class="color-bg angle-top white-bg tastingroomintro">
		<div class="container">
			<h2>Visit the Surf Brewery on Site Tasting Room in Ventura, CA</h2>
			<p class="cols">What better place to sample Surf Brewery beers than in our tasting room at the brewery.  Belly up to the bar, or sit back and enjoy the surfing themed decor and artwork by local artisans all directly in front of our brewery so you can see where the fresh brew you're drinking was born.  Like a little side of sports with your brew?  No problem, every seat has a view of a TV so you wont miss a down.</p>
			<p>The Tasting Room at Surf Brewery was named one of the Top Ten Places to Drink a Beer by Draft Magazine! <a href="http://surfbrewery.com/pdf/DRAFT-mag.pdf" target="_blank">Read More Here</a></p>
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-push-1 col-md-8 col-md-push-2 m-t-1 m-b-2">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="//www.youtube.com/embed/XHTLjlRfFkc?rel=0&showinfo=0&autohide=1&wmode=transparent"></iframe>
					</div>
				</div>
			</div>
			<h3 class="text-xs-center icon icon-inline"><a href="https://www.google.com/maps/place/Surf+Brewery/@34.25786,-119.231163,15z/data=!4m2!3m1!1s0x0:0xbea75e53a78c8b96" target="_blank"><svg viewBox="0 0 14 20"><use xlink:href="svg/defs.svg#location"></use></svg> Get directions to Surf Brewery on Google Maps</a></h3>
		</div>
		<span class="glass-circle img-circle surf">
			<svg viewBox="0 0 68.72 88.81">
			   <use xlink:href="svg/defs.svg#logo"></use>
			</svg>
		</span>
	</section>
	<section class="color-bg angle-top primary-bg tastingroomhours">
		<div class="container">
			<h2>Tasting Room Hours of Operation</h2>

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
	<section class="color-bg angle-top secondary-bg prices">
		<div class="container">
			<h2>Tasting Room Prices</h2>
			<div class="row">
				<div class="tastingroom-prices col-md-10 col-md-offset-1">
					<ul class="striped p-a-0">
						<li>
							<span class="item bold">Glass, 12oz/16oz</span><span class="price bold">$5.00 - $6.00</span><span class="note">Varies by beer style</span>
						</li>
						<li>
							<span class="item bold">5oz Sample</span><span class="price bold">$2.00 - $3.00</span><span class="note">Varies by beer style</span>
						</li>
						<li>
							<span class="item bold">Surfboard Sampler</span><span class="price bold"></span><span class="note">4, 6, 8, or 10 samples</span>
						</li>
						<li>
							<span class="item bold">New Growler, 32oz</span><span class="price bold">$2.25</span><span class="note">Unfilled</span>
						</li>
						<li>
							<span class="item bold">New Growler, 64oz</span><span class="price bold">$4.50</span><span class="note">Unfilled</span>
						</li>
						<li>
							<span class="item bold">Refill Growler, 32oz</span><span class="price bold">$7.00 - $10.00</span><span class="note">Varies by beer style</span>
						</li>
						<li>
							<span class="item bold">Refill Growler, 64oz</span><span class="price bold">$13.00 - $20.00</span><span class="note">Varies by beer style</span>
						</li>
						<li>
							<span class="item bold">20% off Growler fills</span><span class="price bold"></span><span class="note">Tuesday - Thursday</span>
						</li>
						<li>
							<span class="item bold">Sunday Growler fill</span><span class="price bold">$10.00</span><span class="note">One Random Beer Style</span>
						</li>
						<li>
							<span class="item bold">Bottled Beer, 22oz</span><span class="price bold">$3.00 - $8.00</span><span class="note">Varies by beer style</span>
						</li>
						<li>
							<span class="item bold">Case, 12x22oz</span><span class="price bold">$32.00 - $88.00</span><span class="note">Varies by beer style</span>
						</li>
						<li>
							<span class="item bold">Sodas</span><span class="price bold">$2.50 - $3.50</span><span class="note"></span>
						</li>
						<li>
							<span class="item bold">Military Discount</span><span class="price bold">5% off</span><span class="note">Must show current ID</span>
						</li>
						<li>
							<span class="item bold">AHA Discount</span><span class="price bold">5% off</span><span class="note">Must show current ID</span>
						</li>
					</ul>
					<p class="m-t-1 text-xs-center">Kegs are also available in 15.5 gal and 5.1 gal sizes.  <a href="beer?scrollto=kegs">Click here for pricing and availability</a>.</p>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 72.5 114.7">
			   <use xlink:href="svg/defs.svg#pintglass"></use>
			</svg>
		</span>
	</section>
	<section id="beerclub" class="color-bg angle-top black-bg">
		<div class="container">
			<h2>Surf Brewery Beer Club</h2>
			<p>Join our &ldquo;Locals Only&rdquo; Beer Club and get exclusive perks!</p>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<h3>Beer Club Membership Includes:</h3>
					<ul class="arrow clearfix">
			            <li>One full growler</li>
			            <li>One Surf logo t-shirt</li>
			            <li>One Surf sticker</li>
			            <li>10% off merchandise</li>
			            <li>$1 off pint prices</li>
			            <li>20% off growler fills on Tuesday</li>
			            <li>10% off kegs &amp; bottles (including barrel-aged)</li>
			        </ul>
			        <h3>Further Perks (all of the above plus):</h3>
			        <ul class="arrow">
			            <li>Wahines (ladies) receive $1.50 off pints</li>
			            <li>Old Dudes (50 yrs+) receive an extra 10% off growler fills</li>
			            <li>Home Brewer (homebrew club membership) receive 10% off homebrew supplies</li>
			        </ul>
			        <h3>Beer Club Pricing:</h3>
			        <div class="tastingroom-prices col-sm-10 col-md-10 col-lg-8">
			        	<ul class="striped m-a-0 p-a-0">
			        		<li>
			        			<span class="item bold">Standard</span><span class="price bold">$55 per year</span><span class="note">$45 renewal</span>
			        		</li>
			        		<li>
			        			<span class="item bold">Home Brewer</span><span class="price bold">$65 per year</span><span class="note">$55 renewal</span>
			        		</li>
			        	</ul>
			        </div>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle surf">
			<svg viewBox="0 0 68.72 88.81">
			   <use xlink:href="svg/defs.svg#logo"></use>
			</svg>
		</span>
	</section>

	<section class="color-bg angle-top white-bg">
		<div class="container">
			<h2>Entertainment at the Tasting Room</h2>
			<p>Come join us fo live music in the Surf Tasting Room, most Saturdays from 6-8pm!</p>

			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<?php
						$get_music = $conn->prepare('SELECT * FROM bands WHERE date >= CURDATE() ORDER BY date ASC');
						$get_music->execute();

						$count = $get_music->rowCount();
						$first_half = ceil($count/2);

						if ($count == 0) {
					?>
						<p class="text-center">We dont have any bands on the calendar at the moment, but keep an eye out here or follow us on <a href="http://twitter.com/surfbrewery" target="_blank">Twitter</a> and <a href="http://www.facebook.com/surfbrewery" target="_blank">Facebook</a> where we will always post upcoming bands as well.</p>
					<?php
						} else {
					?>
						<ul class="arrow">
					<?php
							while($band = $get_music->fetch(PDO::FETCH_OBJ)){
					?>
							<li>
								<strong>
									<time datetime="<?php echo $band->date; ?>"><?php echo date("F j", strtotime($band->date)); ?></time>: <?php echo $band->name; ?>
								</strong> - <span><?php echo $band->description; ?></span>
							</li>
					<?php
							}
					?>
						</ul>
					<?php
					    }
					?>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 12 18">
			   <use xlink:href="svg/defs.svg#music"></use>
			</svg>
		</span>
	</section>

	<section class="color-bg angle-top primary-bg less-padding">
		<div class="container">
			<h2>Food at the Tasting Room</h2>
			<p>You are welcome to bring in whatever food you like to enjoy with our beer. We do offer a few snack items for purchase, and are proud to have a local Ventura food truck on site every day that the tap room is open.</p>

			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<ul class="arrow">
		                <li><strong>Escabeche Bistro</strong> - French Mexican is onsite Tuesday through Sunday - <a target="_blank" href="http://www.escabechebistro.com/">Website</a></li>
		                <!-- <li><strong>Famous Franks</strong> - Every Monday, and the 3rd Tuesday each month - <a target="_blank" href="http://www.worldfamousfranks.com/">Website</a></li>
		                <li><strong>Scratch Food Truck</strong> - 4th Tuesday each month - <a target="_blank" href="http://www.scratchventura.com/">Website</a></li> -->
		            </ul>
		        </div>
		    </div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 19.121 18.157">
			   <use xlink:href="svg/defs.svg#dining"></use>
			</svg>
		</span>
	</section>

	<section class="photo-bg dark-bg angle-top virtualtour-bg with-text with-icon">
		<div class="container">
			<h2>Surf Brewery 3D Tour</h2>
			<p class="photo-text text-xs-center">Take a 3D virtual tour of our tasting room, homebrew shop, and brew house right on your computer or device.<br>Big thanks to <a href="http://www.divirtualtours.com/">DI Virtual Tours</a> for shooting the brewery.</p>
			<p class="text-xs-center"><a class="btn btn-primary depth-1" href="https://my.matterport.com/show/?m=VPjcWfQ1BZ9">View Tour</a></p>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 24 24">
			   <use xlink:href="svg/defs.svg#3d"></use>
			</svg>
		</span>
	</section>

	<?php include_once('instagram_feed.php'); ?>
	<section class="photo-bg angle-top map-bg"></section>
	<?php
	include_once('footer.php');
	include_once('scripts.php');
	?>
</body>
</html>
