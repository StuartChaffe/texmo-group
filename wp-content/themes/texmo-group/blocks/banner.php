<?php
/**
* The template used for displaying a banner.
*/
$image = get_field('banner_image');
$content = get_field('banner_content');
?>

<section class="banner" style="background-image: url('<?php echo $image['banner_image_large']['url']; ?>')">
	<?php if ( $content ) { ?>
		<div class="banner--content">
			<?php echo $content ?>
		</div>
	<?php } ?>
	<img loading="lazy" class="hidemobile" src="<?php echo $image['banner_image_large']['url']; ?>" alt="<?php echo $image['banner_image_large']['alt']; ?>" />
	<?php if ( $image['banner_image_mobile'] ) { ?><img loading="lazy" class="hidedesktop" src="<?php echo $image['banner_image_mobile']['url']; ?>" alt="<?php echo $image['banner_image_mobile']['alt']; ?>" /><?php } ?>
</section>