<?php

include_once('db_connect.php');

$pageTitle = 'Ventura&rsquo;s Surf Brewery - The Beer';

function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
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
	<div class="photo-bg title-bg beers-bg dark-bg parallax">
		<div class="container text-xs-center">
			<div class="title-holder">
				<h1>Our Beer</h1>
			</div>
		</div>
	</div>
	<section id="beers" class="color-bg angle-top white-bg beers">
		<h1 class="sr-only">Surf Brewery Beer</h1>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-6 beer-col">
					<?php
						$get_beer = $conn->prepare('SELECT * FROM beer WHERE brand = 0 AND published = 1 ORDER BY id ASC');
						$get_beer->execute();

						$count = $get_beer->rowCount();
						$first_half = ceil($count/2);
						$beer_count = 1;

						while($beer = $get_beer->fetch(PDO::FETCH_OBJ)){
					?>

					<div class="beer color-bg black-bg">
						<h2 class="name"><span class="name font-marker" style="color: <?php echo $beer->label; ?>;"><?php echo $beer->name; ?></span> <span class="style"><?php echo $beer->style; ?></span></h2>
						<div class="description" style="background-color: rgba(<?php echo implode(', ', hex2rgb($beer->label)); ?>,.3);">
							<?php
								/*if (trim($beer->img)) {
									?>
									<figure class="label-img">
										<img src="<?php echo $beer->img; ?>" alt="<?php echo $beer->name; ?> label" class="img-fluid">
									</figure>
									<?php
								}*/
							?>
							<p><?php echo $beer->description; ?></p>
							<?php
								if ($beer->kegSM > 0 || $beer->kegLG > 0) {
									?>
										<p class="text-xs-center"><span class="text-nowrap keg">Available by the keg: </span>
									<?php
									if ($beer->kegLG > 0) {
										?>
											<span class="text-nowrap keg">
												<svg class="inline" viewBox="0 0 96.57 141.6">
													<use xlink:href="svg/defs.svg#keg_half"></use>
												</svg> 15.5 Gal $<?php
										echo $beer->kegLG;
										?>
											</span>
										<?php
									}
									if ($beer->kegSM > 0) {
										?>
											<span class="text-nowrap keg">
												<svg class="inline" viewBox="0 0 56.6 141.6">
													<use xlink:href="svg/defs.svg#keg_sixth"></use>
												</svg> 5.1 Gal $<?php
										echo $beer->kegSM;
										?>
											</span>
										<?php
									}
									?>
										</p>
									<?php
								}
								if ($beer->ltd == 1) {
									?>
										<p class="limited text-xs-center" style="color: rgb(<?php echo $beer->label; ?>);">Limited Release!</p>
									<?php
								}
							?>
							<div class="specs text-xs-center">
								<h3 class="small">Specifications for <?php echo $beer->name; ?></h3>
								<ul class="list-unstyled">
									<li><?php echo $beer->plato; ?>&deg; Plato</li><li>
									<?php echo $beer->ibu; ?> IBU</li><li>
									<?php echo $beer->srm; ?> SRM</li><li>
									<?php echo $beer->abv; ?>% ABV</li>
								</ul>
							</div>
						</div>

						<span class="beer-icon srm<?php echo $beer->icon; ?>">
							<svg class="body" viewBox="0 0 63 95.3">
							   <use xlink:href="svg/defs.svg#beer_icon_body"></use>
							</svg>
							<svg class="glass" viewBox="0 0 73.5 124.9">
							   <use xlink:href="svg/defs.svg#beer_icon_glass"></use>
							</svg>
							<?php
							if ($beer->award) {
								?>
								<svg class="medal" viewBox="0 0 70.1 61.2">
								   <use xlink:href="svg/defs.svg#<?php echo $beer->award; ?>"></use>
								</svg>
								<?php
							}
							?>
						</span>
					</div>

					<?php
						if ($beer_count == $first_half) {
							?>
							</div>
							<div class="col-xs-12 col-lg-6 beer-col">
							<?php
						}
						$beer_count++;
					}
					?>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle surf">
			<svg viewBox="0 0 68.72 88.81">
			   <use xlink:href="svg/defs.svg#logo"></use>
			</svg>
		</span>
	</section>
	<section id="kegs" class="also-on-tap color-bg angle-top primary-bg">
		<div class="container">
			<h2>Kegged Beer from Surf Brewery</h2>
			<p>Do you want to serve Surf Brewery beer at your own party or event?  We have you covered with fresh kegged beer directly from our brewery in Ventura!  All hardware required to dispense your kegged beer is also available to rent.</p>

			<div class="row">
				<div class="keg-prices col-lg-10 col-lg-offset-1">
					<h3>Kegs</h3>
					<p>15.5 gallons (&frac12; BBL) serves about 124 pints of beer,  5.1 gallons (&frac16; BBL) serves about 40 pints of beer.  All kegs require a refundable deposit.</p>
					<ul class="striped p-a-0">
						<li>
							<span class="name bold ch">Beer</span><span class="half bold ch">15.5 gal</span><span class="sixth bold ch">5.1 gal</span>
						</li>
						<?php
						$get_beer = $conn->prepare('SELECT * FROM beer ORDER BY id ASC');
						$get_beer->execute();

						while($beer = $get_beer->fetch(PDO::FETCH_OBJ)){
							if ($beer->kegSM > 0 || $beer->kegLG > 0) {
								?>
								<li>
									<span class="name bold"><?php echo $beer->name.' '.$beer->style; ?></span><span class="half"><?php echo $beer->kegLG > 0 ? '$'.$beer->kegLG : 'Contact Us'; ?></span><span class="sixth"><?php echo $beer->kegSM > 0 ? '$'.$beer->kegSM : 'Contact Us'; ?></span>
								</li>
								<?php
							}
						}
						?>
						<li><span class="name bold">Refundable Deposit *</span><span class="half">$100.00</span><span class="sixth">$50.00</span></li>
						<li><span class="name bold">Beer Club Member <small class="font-weight-normal"><a href="tastingroom?scrollto=beerclub">info</a></small></span><span class="half">10% off</span><span class="sixth">10% off</span></li>
					</ul>
					<p class="m-t-1">For availability and reservations email: <a href="mailto:beer@surfbrewery.com">beer@surfbrewery.com</a></p>
				</div>
			</div>

			<div class="row">
				<div class="keg-prices col-lg-10 col-lg-offset-1 m-t-1">
					<h3>Hardware Rental</h3>
					<p>If you need any hardware to dispense your keg of beer, we can set you up with everything you need.  Also get $5 off any rental fee with a keg purchase!</p>
					<ul class="striped p-a-0">
						<li>
							<span class="name bold ch">Item</span><span class="half bold ch">Rental Fee</span><span class="sixth bold ch">Deposit *</span>
						</li>
						<li>
							<span class="name bold">Pump (single) and plastic bin</span><span class="half">$25.00</span><span class="sixth">$30.00</span>
						</li>
						<li>
							<span class="name bold">One tap jockey box, includes CO2 tank</span><span class="half">$60.00</span><span class="sixth">$250.00</span>
						</li>
						<li>
							<span class="name bold">Two tap jockey box, includes CO2 tank</span><span class="half">$80.00</span><span class="sixth">$250.00</span>
						</li>
						<li>
							<span class="name bold">CO2 tank by itself</span><span class="half">$50.00</span><span class="sixth">$100.00</span>
						</li>
					</ul>
					<p class="m-t-1">Note: Ice is NOT included.</p>
					<p class="small">* In order to receive a full refund on your security deposit, please read carefully:  Keg, pump and bin must be <b>returned within 45 days</b>, if not a <b>$20 per week additional</b> rental fee will be charged. Jockey boxes must be <b>returned within 7 days</b>, or a <b>$25 per day additional</b> rental fee will be charged.</p>
				</div>
			</div>

		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 96.57 141.6">
			   <use xlink:href="svg/defs.svg#keg_half"></use>
			</svg>
		</span>
	</section>
	<section class="also-on-tap color-bg angle-top secondary-bg">
		<div class="container">
			<h2>Also on tap at Surf Brewery</h2>
			<p>Besides our year-round and seasonal brews, we also serve blends, specialty beers and non-alcoholic beverages.</p>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<h3 class="icon"><svg viewBox="0 0 72.5 114.7"><use xlink:href="svg/defs.svg#pintglasshalf"></use></svg> Shondo</h3>
					<p>A blend of Mondos Blonde Ale and lemonade, our local twist on a Shandy!</p>
					<h3 class="icon"><svg viewBox="0 0 72.5 114.7"><use xlink:href="svg/defs.svg#pintglasshalf"></use></svg> Black &amp; Rye</h3>
					<p>A blend of Surf Black IPA and County Line Rye, 6.25% ABV.</p>
					<h3 class="icon"><svg viewBox="0 0 93.883 120.885"><use xlink:href="svg/defs.svg#hops"></use></svg> Hop Rocket&reg;</h3>
					<p>NEW each Friday, give us a shout or stop by to see what's hitting the Rocket this week!</p>
					<?php
						$get_rocket = $conn->prepare('SELECT * FROM hoprocket ORDER BY id ASC');
						$get_rocket->execute();

						$rocket = $get_rocket->fetch(PDO::FETCH_OBJ);
						if ($rocket->value) {
							echo '<p>'.$rocket->value.'</p>';
						}
					?>
					<p>Hop Rocket&reg; is a registered trademark of Blichmann Engineering. It is a stainless steel device that we use to provide super freshness in a glass on Friday Nights. Whole leaf hops and usually some other fresh ingredients are packed into the Hop Rocket&reg; and connected up to our draft line at the bar. One of our standard beers is filtered through the fresh ingredients into a glass. Pleasure noises or words are heard throughout the brewery as patrons enjoy the freshest brew possible.</p>
					<h3 class="icon"><svg viewBox="0 0 124.525 137.551"><use xlink:href="svg/defs.svg#barrel"></use></svg> Barrel-Aged Beer</h3>
					<p>Periodically we will tap a keg of our limited release Scientific Series&trade; Barrel-Aged beer.</p>
					<?php
						$get_barrel = $conn->prepare('SELECT * FROM barrel ORDER BY id ASC');
						$get_barrel->execute();

						$barrel = $get_barrel->fetch(PDO::FETCH_OBJ);
						if ($barrel->value) {
							echo '<p>'.$barrel->value.'</p>';
						}
					?>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 72.5 114.7">
			   <use xlink:href="svg/defs.svg#pintglass"></use>
			</svg>
		</span>
	</section>
	<section class="terminology color-bg angle-top black-bg">
		<div class="container">
			<h2>Brewing Terminology</h2>
			<p>Beer brewing like anything else has its own set of lingo and terminology. So if you hear some words thrown around that you don't understand, don't hesitate to ask!</p>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<dl>
						<dt>&deg; Plato</dt>
						<dd>Simply the measurement of fermentables (ie. sugar) present in the wort before it is fermented into beer. Named after German scientist Fritz Plato who in 1900 revised the current scale to correct errors of measurement.</dd>
						<dt><abbr title="International Bittering Units">IBU</abbr></dt>
						<dd>Stands for <em>International Bittering Units</em>. This refers to the amount of isomerized hop resins in the beer, and is given in parts per million. Essentially, the higher this number, the more bitter the beer. This can be misleading however as bitterness is a subjective perception, and other ingredients can change the flavor. Our suggestion, try them all!</dd>
						<dt><abbr title="Standard Reference Method">SRM</abbr></dt>
						<dd>Stands for <em>Standard Reference Method</em>. This is one of several systems modern brewers use to describe the color of beer. SRM uses light meters to measure color density passing through 1 cm of beer. The higher the number, the darker the beer.</dd>
						<dt><abbr title="Alcohol by Volume">ABV</abbr></dt>
						<dd>Stands for <em>Alcohol by Volume</em>. The percentage of your beer that is alcohol, typically between 4% - 10%.</dd>
					</dl>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 14 20">
			   <use xlink:href="svg/defs.svg#bulb"></use>
			</svg>
		</span>
	</section>
	<?php include_once('instagram_feed.php'); ?>
	<section class="photo-bg angle-top fermenters-bg"></section>
	<?php
	include_once('footer.php');
	include_once('scripts.php');
	?>
</body>
</html>
