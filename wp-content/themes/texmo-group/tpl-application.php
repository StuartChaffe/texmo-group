<?php
// Template Name: Application
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<article> 
		Career application
		<?php the_content(); ?>
	</article>
	
<?php endwhile; ?>

<?php get_footer(); ?>