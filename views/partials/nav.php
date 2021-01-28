<header>
	<a href="/" class="logo">
		<h1 class="logo-text">Meme<span>logy</span></h1>
	</a>
	<i class="fa fa-bars menu-toggle"></i>
	<ul class="nav">

		
		<li><a href="/">Home</a></li>
		
		<?php if (isset($_SESSION['id'])): ?>
			<li>
				<a href="#">
					<i class="fa fa-user"></i>
					<?php echo$_SESSION['username']; ?>
						Memelogy
					<i class="fa fa-chevron-down" style="font-size: .8em;"></i>
				</a>		
				<ul>
				<?php if($_SESSION['admin']): ?>
					<li><a href="<?php echo 'admin/dashboard.php' ?>">Dashboard</a></li>
				<?php endif; ?>
					
					<li><a href="#" class="../../logout.php">Logout</a></li>
				</ul>
			</li>
		<?php else: ?>	
			<li><a href="<?php echo '../register.php' ?>">Sign up</a></li>
			<li><a href="<?php echo '../login.php' ?>">Login</a></li>
		<?php endif; ?>	
			

	</ul>
</header>
