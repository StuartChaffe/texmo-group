<header class="global-header">
	<div class="global-header--inner">
	<h1 class="global-header--logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/src/images/logo.svg" alt="Texmo Group logo" /></a></h1>
		<button class="global-header--nav-btn" type="button">
			<span class="global-header--nav-box">
				<span class="global-header--nav-inner"><span>Show menu</span></span>
			</span>
		</button>
		<a href="/careers" class="btn">Careers</a>
		<nav class="global-header--nav global-header--nav__mobile">
			<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
		</nav>
	</div>
</header>