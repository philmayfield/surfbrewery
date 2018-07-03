<nav id="primary-nav" class="navbar navbar-light bg-faded">
	<ul class="nav navbar-nav">
		<!-- <li class="nav-item<?php if(strpos($_SERVER['PHP_SELF'],'main') > 0){echo ' active';}?>"><a class="nav-link" href="admin/main.php">Home</a></li> -->
		<?php 
		foreach ($cats as $value) {
			if (strpos($value, 'edit') === 0) {
				continue;
			}
			?>

			<li class="nav-item
			
			<?php
			if(strpos($_SERVER['PHP_SELF'], $value) > 0){
				echo ' active';
			}
			?>

			"><a class="nav-link" href="admin/<?php echo $value; ?>.php"><?php echo ucfirst($value); ?></a></li>
			
			<?php
		}
		?>
		<li class="nav-item"><a class="nav-link" href="admin/logout.php">Log Out</a></li>
	</ul>
</nav>