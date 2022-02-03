<?php
/**
* The template used for displaying a link list.
*/
$bkg = get_field('bkg-colour');
$title = get_field('title');
?>

<section class="link-list <?php echo $bkg ?>">
	<div class="link-list--title">
		<h2><?php echo $title; ?></h2>
	</div>
	<?php if( have_rows('links') ) { ?>
	<div class="carousel-slider">
		<?php while( have_rows('links') ): the_row();
			$image = get_sub_field('company_image');
			$link = get_sub_field('link');
			$url = $link['company_link'];
			$linktext = $link['company_link_text'];
			$logos = get_sub_field( 'logo' );
		?>

		<a class="link-list-item" href="<?php echo $url['url']; ?>">
			<?php if ( $image ) { ?><div class="link-list-item--image"><img loading="lazy" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php if ( $logos ) { 
				$logo = get_field('company_icon', $logos);
				?>
					<img class="link-list-item--logo" loading="lazy" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
				<?php } ?>
			</div>
			<?php } ?>
			<?php if ( $linktext ) { ?>
				<p><?php echo $linktext; ?></p>
			<?php } elseif ( $url['title'] ) { ?>
				<p><?php echo $url['title']; ?></p>
			<?php } ?>
			<span>↳</span>

		</a>
		<?php endwhile; ?>
	</div>
	<?php } ?>
</section>