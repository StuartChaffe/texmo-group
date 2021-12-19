<?php
/**
* The template used for displaying a cta block.
*/
$cta = get_field('cta');
?>

<section class="cta">
	<!-- <?php if ($cta['cta_content']) { ?>
		<?php echo $cta['cta_content']; ?>
	<?php } ?>

	<div class="cta--buttons">
		<?php if ($cta['button']) { ?>
			<a class="btn" target="<?php echo $cta['button']['target']; ?>" href="<?php echo $cta['button']['url']; ?>"><?php echo $cta['button']['title']; ?></a>
		<?php } ?>
		<?php if ($cta['button_2']) { ?>
			or <a class="btn" href="<?php echo $cta['button_2']['url']; ?>"><?php echo $cta['button_2']['title']; ?></a>
		<?php } ?>
	</div> -->
</section>