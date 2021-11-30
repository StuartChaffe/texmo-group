<?php
/**
* The template used for displaying a banner.
*/
$image = get_field('banner_image');
$imagemobile = get_field('banner_image_mobile');
$title = get_field('banner_title', false, false);
?>

<section class="banner">
	<div class="banner--image" style="background-image: url('<?php echo $image['url']; ?>')">
		<img loading="lazy" class="hidemobile" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		<?php if ( $imagemobile ) { ?><img loading="lazy" class="hidedesktop" src="<?php echo $imagemobile['url']; ?>" alt="<?php echo $imagemobile['alt']; ?>" /><?php } ?>
	</div>
	<?php if ( $title ) { ?>
	<div class="container">
		<div class="banner--title">
			<h1><?php echo $title ?></h1>
		</div>
	</div>
	<?php } ?>
</section>