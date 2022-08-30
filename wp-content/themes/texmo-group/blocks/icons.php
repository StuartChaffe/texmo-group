<?php
/**
* The template used for displaying an icon list.
*/
$bkg = get_field('bkg-colour');
?>

<section class="<?php echo $bkg ?>">
	<div class="icons icons-slider">
	<?php if( have_rows('icons') ) { ?>
		<?php while( have_rows('icons') ): the_row();
			$icon = get_sub_field('icon');
			$content = get_sub_field('content');
		?>
		<div class="icons-item">
			<div class="icons-item--image">
				<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
			</div>
			<p><?php echo $content; ?>
		</div>
		<?php endwhile; ?>
	<?php } ?>
	</div>
</section>