<?php
/**
* The template used for displaying all stories.
*/

?>
<?php
	$posts = new WP_Query( array(
		'post_type' => 'stories',
		'posts_per_page' => -1,
		'orderby' => 'date',
		'order' => 'DESC',
	));
?>

<?php if ($posts->have_posts()) : ?>
<section class="bkg--white">
	<div class="stories">
	<?php while($posts->have_posts()) : $posts->the_post(); ?>

		<?php
			$banner = get_field('banner_image', get_the_ID());
			$image = get_field('square_image', get_the_ID());
			$name = get_field('story_name', get_the_ID());
		?>
		<div class="stories-item">
			<div class="stories-item--image">
				<?php echo get_the_post_thumbnail(get_the_ID(), 'Small'); ?>
			</div>	
			<div class="stories-item--content">
				<h3><?php if ( $name ) { ?><?php echo $name; ?> -<br /><?php } ?><?php the_title(); ?></h3>
				<?php the_excerpt(); ?>

				<a href="<?php esc_url( the_permalink() ); ?>" class="btn">Read more</a>
			</div>
		</div>
		
	<?php endwhile; wp_reset_query(); ?>
	</div>
</section>
<?php endif; ?>