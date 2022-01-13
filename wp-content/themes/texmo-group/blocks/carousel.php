<?php
/**
* The template used for displaying a carousel.
*/
$bkg = get_field('bkg-colour');
$type = get_field('carousel_type');
$title = get_field('carousel_title');
?>

<section class="carousel <?php echo $bkg; ?>">
	<?php if( have_rows('carousel') ) { ?>
	<?php if ( $title ) { ?>
		<h2 class="carousel-item--title"><?php echo $title; ?></h2>
	<?php } ?>
	<div class="carousel-full <?php echo $type; ?>">
		<?php while( have_rows('carousel') ): the_row();
			$image = get_sub_field('carousel_image');
			$content = get_sub_field('carousel_content');
			$contentleft = get_field('carousel_content_left');
			$contentright = get_field('carousel_content_right');
		?>
		<div class="carousel-item">
			<?php if ( $content ) { ?>
				<div class="carousel-textleft--content">
					<?php echo $content; ?>
				</div>
			<?php } ?>
			
			<?php if ( $image ) { ?><div class="carousel-textleft--image"><img loading="lazy" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div><?php } ?>
		</div>
		<?php endwhile; ?>
	</div>

		<?php if ( $type == 'carousel-standard' ) { ?>
		<div class="carousel-full--content">
			<?php if ( $contentleft ) { ?>
				<div>
					<?php echo $contentleft ?>
				</div>
			<?php } ?>

			<?php if ( $contentright ) { ?>
				<div>
					<?php echo $contentright ?>
				</div>
			<?php } ?>
		</div>
		<?php } ?>
	<?php } ?>
</section>