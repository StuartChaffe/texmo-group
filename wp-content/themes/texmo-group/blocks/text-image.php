<?php
/**
* The template used for displaying a text with image block.
*/
$content = get_field('text-image-content');
$bkg = get_field('bkg-colour');
$image = get_field('image');
?>

<section class="text-image <?php echo $bkg ?> <?php echo $image['text-image-position'] ?>">
	<div class="text-image--content">
	
	<?php echo $content ?>
	</div>
	<div class="text-image--image" style="background-image: url('<?php echo $image['text-image-image']['url']; ?>')">
		<img loading="lazy" src="<?php echo $image['text-image-image']['url']; ?>" alt="<?php echo $image['text-image-image']['alt']; ?>" />
	</div>
</section>