<?php

include_once('db_connect.php');

$pageTitle = 'Ventura&rsquo;s Surf Brewery - Events';

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
	<div class="photo-bg title-bg events-bg dark-bg parallax">
		<div class="container text-xs-center">
			<div class="title-holder">
				<h1>Events</h1>
			</div>
		</div>
	</div>
	<section id="events" class="color-bg angle-top white-bg events">
		<div class="container">
			<h2>Surf Brewery Events</h2>
			<p>Surf Brewery is constly participating in or hosting events in and around Ventura county.</p>

			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">

					<?php
						$get_events = $conn->prepare('SELECT * FROM events  WHERE date >= CURDATE() ORDER BY date ASC');
						$get_events->execute();

						$count = $get_events->rowCount();

						if ($count == 0) {
					?>
						<p class="text-center">We dont have any events coming up at the moment, but keep an eye out here or follow us on <a href="http://twitter.com/surfbrewery" target="_blank">Twitter</a> and <a href="http://www.facebook.com/surfbrewery" target="_blank">Facebook</a> where we will always post upcoming events as well.</p>
					<?php
						} else {

							while($event = $get_events->fetch(PDO::FETCH_OBJ)){
					?>

					<div class="event">
						<h3 class="name icon"><svg viewBox="0 0 18 20"><use xlink:href="svg/defs.svg#event"></use></svg> <?php echo $event->name; ?></h3>
						<p class="place-date">
							<strong>
							<?php
								switch ($event->loc) {
									case 'B':
										echo 'At the brewery ';
										break;
									case 'O':
										echo 'Offsite ';
										break;
								}
							?>
							on <time datetime="<?php echo $event->date; ?>"><?php echo date("F j", strtotime($event->date)); ?></time>
							</strong>
						</p>
						<p class="description"><?php echo $event->description; ?></p>
						<?php
							if ($event->link) {
								?>
									<p><a href="<?php echo $event->link; ?>" target="_blank">More Info</a></p>
								<?php
							}
						?>
					</div>

					<?php
							}
					    }
					?>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 18 20">
			   <use xlink:href="svg/defs.svg#events"></use>
			</svg>
		</span>
	</section>
	<section class="news color-bg angle-top primary-bg">
		<div class="container">
			<h2>Surf Brewery News</h2>
			<p>Now hear this!  Surf Brewery in the news!</p>
			<div class="row">
				<div class="col-xs-12 col-lg-6 beer-col">
					<?php
						$get_news = $conn->prepare('SELECT * FROM news ORDER BY date DESC');
						$get_news->execute();

						$count = $get_news->rowCount();
						$first_half = ceil($count/2);
						$news_count = 1;

						while($news = $get_news->fetch(PDO::FETCH_OBJ)){
					?>

					<article class="news-item">
						<h3><a href="<?php echo $news->link; ?>" title="<?php echo $news->title; ?>" target="_blank"><svg viewBox="0 0 7.41 12"><use xlink:href="svg/defs.svg#arrowright"></use></svg> <?php echo $news->title; ?></a></h3>
						<?php
							if ($news->text) {
								?>
									<p class="text">&ldquo;<?php echo $news->text; ?>&rdquo;</p>
								<?php
							}
						?>
						<small class="source-date"><span class="source">By <?php echo $news->source; ?></span> published on <time datetime="<?php echo $news->date; ?>"><?php echo date("F j, Y", strtotime($news->date)); ?></time></small>
					</article>

					<?php
							if ($news_count == $first_half) {
					?>
						</div>
						<div class="col-xs-12 col-lg-6 beer-col">
					<?php
							}
							$news_count++;
					    }
					?>
				</div>
			</div>
		</div>
		<span class="glass-circle img-circle">
			<svg viewBox="0 0 180 148.4">
			   <use xlink:href="svg/defs.svg#newspaper"></use>
			</svg>
		</span>
	</section>
	<?php include_once('instagram_feed.php'); ?>
	<section class="photo-bg angle-top band-bg"></section>
	<?php
	include_once('footer.php');
	include_once('scripts.php');
	?>
</body>
</html>
