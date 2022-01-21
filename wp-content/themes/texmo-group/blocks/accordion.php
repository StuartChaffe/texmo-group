<?php
/**
* The template used for displaying an accordion.
*/
$bkg = get_field('bkg-colour');
$title = get_field( 'accordion_title');
?>
<section class="accordion <?php echo $bkg ?>">
	<?php if ( $title ) { ?><h2><?php echo $title ?></h2><?php } ?>
	<?php if( have_rows('accordion') ): ?>
		<ul class="accordion-list">
		<?php while( have_rows('accordion') ): the_row();
			$title = get_sub_field('accordion_title', false, false);
			$content = get_sub_field('accordion_content');
			$image = get_sub_field('accordion_image');
			$type = get_sub_field('accordion_content_type');
		?>
			<li>
				<button class="accordion--title" aria-expanded="false"><?php echo $title ?> <svg class="icon icon--open"><use xlink:href="#accordion-arrow"></use></svg></button>
				<div class="accordion--content">

				<?php if ( $type == 'accordion-content') { ?>
					<?php if ( $image ) { ?>
						<div class="accordion--content-image">
							<img loading="lazy" class="" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						</div>
					<?php } ?>
					<?php if ( $content ) { ?>
						<div class="accordion--content-text">
							<?php echo $content ?>
						</div>
					<?php } ?>

				<?php } elseif ( $type == 'accordion-icons' ) { ?>
					<?php if( have_rows('icons') ): ?>
						<div class="accordion-icons">
						<?php while( have_rows('icons') ): the_row();
							$image = get_sub_field('accordion_icon');
							$benefit = get_sub_field('accordion_benefit');
						?>
							<div class="accordion-icons-item">
								<img loading="lazy" class="" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<p><?php echo $benefit ?></p>
							</div>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>
					
				<?php } ?>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
</section>