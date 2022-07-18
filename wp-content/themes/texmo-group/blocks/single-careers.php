<?php
	$name = get_field('story_name', get_the_ID());
	$imagemobile = get_field('story_image_mobile', get_the_ID());
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<section class="fade banner" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'Large' ); ?>')">
	<div class="banner--overlay" style="background-color: rgba(0,0,0,0.40);">&nbsp;</div>
	<div class="banner--content fade fade--delay__1">
		<h1><?php if ( $name ) { ?><?php echo $name; ?> -<br /><?php } ?><?php the_title(); ?></h1>
	</div>
	<img loading="lazy" class="banner--image hidemobile" src="<?php echo get_the_post_thumbnail_url( get_the_ID()); ?>" alt="">
	<?php if ( $imagemobile ) { ?><img loading="lazy" class="banner--image hidedesktop" src="<?php echo $imagemobile['url']; ?>" alt="<?php echo $imagemobile['alt']; ?>" /><?php } ?>

</section>
<div class="bkg--white">
	<article> 
		
		<?php the_content(); ?>
		<h1>testSDF<br>
No Block
</h1>
		
	</article>
</div>
	
<?php endwhile; ?>

<?php get_footer(); ?>