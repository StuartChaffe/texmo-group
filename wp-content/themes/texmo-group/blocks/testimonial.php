<?php
/**
* The template used for displaying a testimonial.
*/
$bkg = get_field('bkg-colour');
$testimonial = get_field('testimonial');
$image = get_field('image');
?>

<section class="testimonial <?php echo $bkg ?> <?php echo $image['position']; ?>">
	<div class="testimonial--quote">
		<div class="testimonial--quote__position">
			<?php if ( $testimonial['quote'] ) { ?><p class="lead"><?php echo $testimonial['quote'] ?></p><?php } ?>
			<?php if ( $testimonial['author'] ) { ?><p><?php echo $testimonial['author'] ?></p><?php } ?>
		</div>
	</div>

	<div class="testimonial--image" style="background-image: url('<?php echo $image['image']['url']; ?>')">
		<img loading="lazy" src="<?php echo $image['image']['url']; ?>" alt="<?php echo $image['image']['alt']; ?>" />
	</div>
</section>