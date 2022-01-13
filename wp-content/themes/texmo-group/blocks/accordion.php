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
			?>
				<li>
					<button class="accordion--title" aria-expanded="false"><?php echo $title ?> <svg class="icon icon--open"><use xlink:href="#accordion-arrow"></use></svg></button>
					<div class="accordion--content">
						<div class="accordion--content-text">
							<?php echo $content ?>
						</div>
					</div>
				</li>
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>
</section>