<?php
/**
* The template used for displaying a featured stories block.
*/
$bkg = get_field('bkg-colour');
$title = get_field('featured_stories_title');
$featuredstories = get_field( 'select_stories' );
?>

<section class="link-list <?php echo $bkg ?>">
	<?php if ( $title ) { ?>
	<div class="link-list--title">
		<h2><?php echo $title; ?></h2>
	</div>
	<?php } ?>

	<?php if( $featuredstories ): ?>	
		<div class="carousel-slider">
		<?php foreach( $featuredstories as $featuredstory ):
			$title = get_the_title($featuredstory);
			$banner = get_field('banner_image', $featuredstory);
			$image = get_field('square_image', $featuredstory);
			$name = get_field('story_name', $featuredstory);
		?>
		<a class="link-list-item" href="<?php esc_url(the_permalink($featuredstory) ); ?>">
			<div class="link-list-item--image">
				<?php echo get_the_post_thumbnail($featuredstory, 'Small'); ?>
			</div>	
			<p><?php if ( $name ) { ?><?php echo $name; ?> -
				<?php } ?><?php echo($title); ?></p>
				<?php the_excerpt(); ?>
			<span>↳</span>
		</a>
	
		<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>