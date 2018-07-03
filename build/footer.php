<footer>
	<section class="color-bg angle-top white-bg">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-push-4 text-xs-center">
					<address>
						<h4>Surf Brewery<sub>&reg;</sub></h4>
						<a href="https://www.google.com/maps/place/Surf+Brewery/@34.2578644,-119.2333517,1013m/data=!3m2!1e3!4b1!4m2!3m1!1s0x80e84d5633104f35:0xbea75e53a78c8b96">4561 Market St. Suite A<br>
						Ventura, CA 93003</a>
						<br>
						<a href="tel:8056442739">(805) 644-BREW</a><br>
						<a href="tel:8056442739">(805) 644-2739</a>
					</address>
					<ul class="list-unstyled soc-links">
						<li>
							<a href="https://www.instagram.com/surfbrewery/">
								<span class="sr-only">Instagram</span>
								<svg viewBox="0 0 97.395 97.395">
								   <use xlink:href="svg/defs.svg#instagram"></use>
								</svg>
							</a>
						</li><li>
							<a href="https://twitter.com/surfbrewery">
								<span class="sr-only">Twitter</span>
								<svg viewBox="0 0 24 19.495">
								   <use xlink:href="svg/defs.svg#twitter"></use>
								</svg>
							</a>
						</li><li>
							<a href="http://www.facebook.com/surfbrewery">
								<span class="sr-only">Facebook</span>
								<svg viewBox="0 0 90 90">
								   <use xlink:href="svg/defs.svg#facebook"></use>
								</svg>
							</a>
						</li><li>
							<a href="http://www.youtube.com/user/SurfBrewery">
								<span class="sr-only">Youtube</span>
								<svg viewBox="0 0 24 16.883">
								   <use xlink:href="svg/defs.svg#youtube"></use>
								</svg>
							</a>
						</li><li>
							<a href="https://www.google.com/maps/place/Surf+Brewery/@34.25786,-119.231163,15z/data=!4m2!3m1!1s0x0:0xbea75e53a78c8b96">
								<span class="sr-only">Google Maps</span>
								<svg viewBox="0 0 14 20">
									<use xlink:href="svg/defs.svg#location"></use>
								</svg>
							</a>
						</li>
					</ul>
					<nav>
						<ul class="list-unstyled small">
							<li><a href="index">Home</a></li><li>
							<a href="beer">Beer</a></li><li>
							<a href="events">Events</a></li><li>
							<a href="tastingroom">Tasting Room</a></li><li>
							<a href="findsurf">Surf Travel</a></li><li>
							<a href="homebrew-supplies">Homebrew</a></li><li>
							<a href="http://scientificseries.com/">Barrels</a></li><li>
							<a href="http://surfbrewery.3dcartstores.com/">Shop</a></li><li>
							<a href="https://my.matterport.com/show/?m=VPjcWfQ1BZ9">Virtual Tour</a></li><li>
							<a href="contact">Contact</a></li>
						</ul>
					</nav>
				</div>
				<div class="col-xs-12 col-md-4 col-md-pull-4 text-xs-center text-md-left">
					<h4>Hours</h4>
					<dl class="hours">
						<?php
							$get_hours = $conn->prepare('SELECT * FROM hours');
							$get_hours->execute();

							$hours = $get_hours->fetch(PDO::FETCH_OBJ);
						?>
						<dt>Monday</dt> <dd><?php echo ($hours->mo_o == $hours->mo_c ? $hours->mo_o : $hours->mo_o.' - '.$hours->mo_c); ?></dd>
						<dt>Tuesday</dt> <dd><?php echo ($hours->tu_o == $hours->tu_c ? $hours->tu_o : $hours->tu_o.' - '.$hours->tu_c); ?></dd>
						<dt>Wednesday</dt> <dd><?php echo ($hours->we_o == $hours->we_c ? $hours->we_o : $hours->we_o.' - '.$hours->we_c); ?></dd>
						<dt>Thursday</dt> <dd><?php echo ($hours->th_o == $hours->th_c ? $hours->th_o : $hours->th_o.' - '.$hours->th_c); ?></dd>
						<dt>Friday</dt> <dd><?php echo ($hours->fr_o == $hours->fr_c ? $hours->fr_o : $hours->fr_o.' - '.$hours->fr_c); ?></dd>
						<dt>Saturday</dt> <dd><?php echo ($hours->sa_o == $hours->sa_c ? $hours->sa_o : $hours->sa_o.' - '.$hours->sa_c); ?></dd>
						<dt>Sunday</dt> <dd><?php echo ($hours->su_o == $hours->su_c ? $hours->su_o : $hours->su_o.' - '.$hours->su_c); ?></dd>
					</dl>
				</div>
				<div class="col-xs-12 col-md-4 text-xs-center text-md-right">
					&copy; <?php echo date('Y') ?> Surf Brewery<sub>&reg;</sub>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 p-t-3 text-xs-center byphil">
					<small>Website made with <svg viewBox="0 0 93.883 120.885"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="svg/defs.svg#hops"></use></svg> by <a href="http://www.philmayfield.com">Phil Mayfield</a></small>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle surf">
			<svg viewBox="0 0 68.72 88.81">
			   <use xlink:href="svg/defs.svg#logo"></use>
			</svg>
		</span>
	</section>
</footer>

<div id="age-gate-modal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3 p-y-1">
						<svg viewBox="0 0 404.423 428.45">
						   <use xlink:href="svg/defs.svg#logo_full_dark"></use>
						</svg>
					</div>
				</div>
				<h3 class="text-xs-center">Are you 21 years of age or older?</h3>
			</div>
			<div class="modal-footer text-xs-center">
				<button id="age-gate-yes-btn" type="button" class="btn btn-success depth-1">Yes I am</button>
				<button id="age-gate-no-btn" type="button" class="btn btn-danger depth-1">No I'm not</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
