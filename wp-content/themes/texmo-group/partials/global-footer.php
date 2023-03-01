<footer class="footer">
	<div class="footer--inner">
		<div class="footer--left">
			<img class="footer--logo" src="<?php echo get_template_directory_uri(); ?>/src/images/logo.svg" alt="Texmo Group logo" />
			<div class="footer--companies">
				<div class="footer--companies-item">
					<img src="<?php echo get_template_directory_uri(); ?>/src/images/logo-taro.svg" alt="Texmo Group logo" />
					<p>Taro Pumps<br />
						P.O. Box: 5303,<br />
						Mettupalayam Road,<br />
						Coimbatore - 641 029,<br />
						Tamil Nadu, India.</p>
				</div>
				<div class="footer--companies-item">
					<img src="<?php echo get_template_directory_uri(); ?>/src/images/logo-texmo.svg" alt="Texmo Group logo" />
					<p>Texmo Precision Castings<br />
						OXO House <br />
						4 Joiner Street,<br />
						Sheffield S3 8GW <br />
						United Kingdom</p>
				</div>
				<!-- <div class="footer--companies-item">
					<img src="<?php // echo get_template_directory_uri(); ?>/src/images/taro-water.png" alt="Texmo Group logo" />
					<p>Taro Water<br />
						P.O. Box: 5303,<br />
						Mettupalayam Road,<br />
						Coimbatore - 641 029,<br />
						Tamil Nadu, India.</p>
				</div> -->
			</div>
		</div>
		<div class="footer--right">
		<img width="64" src="<?php echo get_template_directory_uri(); ?>/src/images/est.svg" alt="Texmo Group established" />
			<?php wp_nav_menu( array('theme_location' => 'footer') ); ?>
		</div>
	</div>
</footer>
