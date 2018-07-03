<?php

include_once('db_connect.php');

$pageTitle = 'Ventura&rsquo;s Surf Brewery - Contact Us';

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
	<div class="photo-bg title-bg contact-bg dark-bg parallax">
		<div class="container text-xs-center">
			<div class="title-holder">
				<h1>Contact Us</h1>
			</div>
		</div>
	</div>
	<section id="beers" class="color-bg angle-top white-bg">
		<div class="container">
			<h2 class="sr-only">How to best contact Surf Brewery</h2>
			<p>Getting in touch with us here at Surf Brewery is easy.  Listed here are the various ways you can contact us.</p>
			<hr class="icon">
			<span class="glass-circle img-circle divider">
				<svg viewBox="0 0 14 20">
				   <use xlink:href="svg/defs.svg#location"></use>
				</svg>
			</span>
			<h3>Give us a call or stop by the Brewery</h3>
			<p>Feel free to stop by the brewery during our normal business hours. <a href="https://www.google.com/maps/place/Surf+Brewery/@34.25786,-119.231163,15z/data=!4m2!3m1!1s0x0:0xbea75e53a78c8b96" target="_blank">Get directions to Surf Brewery on Google Maps</a></p>

			<div class="row">
				<div class="col-xs-12 col-md-4 col-lg-5 text-xs-center">
					<address>
						<h4>Surf Brewery<sub>&reg;</sub></h4>
						<a href="https://www.google.com/maps/place/Surf+Brewery/@34.2578644,-119.2333517,1013m/data=!3m2!1e3!4b1!4m2!3m1!1s0x80e84d5633104f35:0xbea75e53a78c8b96" target="_blank">4561 Market St. Suite A<br>
						Ventura, CA 93003</a>
						<br>
						<a href="tel:8056442739">(805) 644-BREW</a><br>
						<a href="tel:8056442739">(805) 644-2739</a>
					</address>
				</div>
				<div class="col-xs-12 col-md-8 col-lg-7 text-xs-center text-lg-left">
					<h4>Hours of Operation</h4>
					<?php
						$get_hours = $conn->prepare('SELECT * FROM hours ORDER BY id ASC LIMIT 1');
						$get_hours->execute();

						$hours = $get_hours->fetch(PDO::FETCH_OBJ);
					?>
					<div class="row">
						<div class="col-md-6 tastingroom-hours">
							<span class="day">Monday</span><span class="hours"><?php echo ($hours->mo_o == $hours->mo_c ? $hours->mo_o : $hours->mo_o.' - '.$hours->mo_c); ?></span>
							<span class="day">Tuesday</span><span class="hours"><?php echo ($hours->tu_o == $hours->tu_c ? $hours->tu_o : $hours->tu_o.' - '.$hours->tu_c); ?></span>
							<span class="day">Wednesday</span><span class="hours"><?php echo ($hours->we_o == $hours->we_c ? $hours->we_o : $hours->we_o.' - '.$hours->we_c); ?></span>
							<span class="day">Thursday</span><span class="hours"><?php echo ($hours->th_o == $hours->th_c ? $hours->th_o : $hours->th_o.' - '.$hours->th_c); ?></span>
						</div>
						<div class="col-md-6 tastingroom-hours">
							<span class="day">Friday</span><span class="hours"><?php echo ($hours->fr_o == $hours->fr_c ? $hours->fr_o : $hours->fr_o.' - '.$hours->fr_c); ?></span>
							<span class="day">Saturday</span><span class="hours"><?php echo ($hours->sa_o == $hours->sa_c ? $hours->sa_o : $hours->sa_o.' - '.$hours->sa_c); ?></span>
							<span class="day">Sunday</span><span class="hours"><?php echo ($hours->su_o == $hours->su_c ? $hours->su_o : $hours->su_o.' - '.$hours->su_c); ?></span>
						</div>
					</div>
				</div>
			</div>
			<?php
			if ($hours->note) {
				?>
				<p class="m-t-1"><?php echo $hours->note; ?></p>
				<?php
			}
			?>

			<hr class="icon">
			<span class="glass-circle img-circle divider">
				<svg viewBox="0 0 20 16">
				   <use xlink:href="svg/defs.svg#mail"></use>
				</svg>
			</span>

			<h3>Send us an email</h3>
			<p>Simply fill out the form below and we'll get back to you as soon as possible!</p>

			<div class="row">
				<div class="m-t-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
					<form id="contact-form" action="contact-form.php" class="contact-form" method="post">

						<div class="form-group">
							<input id="contact-name" name="name" type="text" class="item required" required>
							<label for="contact-name">Name</label>
							<span class="bar"></span>
						</div>

						<div class="form-group">
							<input id="contact-email" name="email" type="email" class="item required" required>
							<label for="contact-email">Email</label>
							<span class="bar"></span>
						</div>

						<div class="form-group">
							<textarea id="contact-message" name="message" class="item required" rows="2" required></textarea>
							<label for="contact-message">Message</label>
							<span class="bar"></span>
						</div>

						<div class="text-xs-right form-controls">
							<button class="btn btn-primary depth-1" role="button" type="submit">
								<svg viewBox="0 0 21 18">
				   					<use xlink:href="svg/defs.svg#send"></use>
								</svg> Send
							</button>
                            <div id="contact-spinner" class="contact-spinner hidden">
                            	<div class="bounce1"></div>
								<div class="bounce2"></div>
								<div class="bounce3"></div>
							</div>
                            <div id="contact-msg" style="display:none;"></div>
						</div>

					</form>
				</div>
			</div>

		</div>
		<span class="glass-circle img-circle surf">
			<svg viewBox="0 0 68.72 88.81">
			   <use xlink:href="svg/defs.svg#logo"></use>
			</svg>
		</span>
	</section>

	<section class="color-bg angle-top primary-bg">
		<div class="container">
			<h2>Our Friends</h2>
			<p>At Surf Brewery we are proud to be a part of the Ventura community and the camaraderie shared by its passionate members.</p>

			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="friend">
						<div class="friend__img">
							<a href="http://maryosbornesurf.com/" target="_blank">
								<img src="img/maryOsborne.png" alt="Mary Osborne Logo" class="depth-1">
							</a>
						</div>
						<div class="friend__body">
							<h3>Mary Osborne</h3>
							<p>Surf Brewery is proud to endorse local surf icon, model, writer and environmentalist Mary Osborne.</p>
						</div>
					</div>

					<div class="friend">
						<div class="friend__img">
							<a href="http://craigtylerstudio.com/" target="_blank">
								<img src="img/craigTyler.png" alt="Pencil Sketch of Craig Tyler" class="depth-1">
							</a>
						</div>
						<div class="friend__body">
							<h3>Craig Tyler</h3>
							<p>All of the Surf Brewery bottle artwork was created by the very talented local artist Craig Tyler.</p>
						</div>
					</div>

					<div class="friend">
						<div class="friend__img">
							<a href="http://www.surfrider.org/" target="_blank">
								<img src="svg/surfrider.svg" alt="Surfrider Foundation logo">
							</a>
						</div>
						<div class="friend__body">
							<h3>Surfrider Foundation</h3>
							<p>To support the efforts of the Surfrider Foundation, we target 1% of total sales donated for this local effort.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 20 18.35">
			   <use xlink:href="svg/defs.svg#heart"></use>
			</svg>
		</span>
	</section>
	<?php include_once('instagram_feed.php'); ?>
	<section class="photo-bg angle-top grain-bg"></section>
	<?php
	include_once('footer.php');
	include_once('scripts.php');
	?>
</body>
</html>
