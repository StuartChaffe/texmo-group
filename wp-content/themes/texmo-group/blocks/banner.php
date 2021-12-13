<?php
/**
* The template used for displaying a banner.
*/
$image = get_field('banner_image');
$content = get_field('banner_content');
?>

<section class="fade banner" style="background-image: url('<?php echo $image['banner_image_large']['url']; ?>')">
<?php if ( $image['banner_image_overlay'] ) { ?><div class="banner--overlay" style="background-color: rgba(0,0,0,0.<?php echo $image['banner_image_overlay'] ?>);">&nbsp;</div><?php } ?>
	<?php if ( $content ) { ?>
		<div class="banner--content fade fade--delay__1">
		<?php echo $content ?>
		</div>
	<?php } ?>
	<img loading="lazy" class="hidemobile" src="<?php echo $image['banner_image_large']['url']; ?>" alt="<?php echo $image['banner_image_large']['alt']; ?>" />
	<?php if ( $image['banner_image_mobile'] ) { ?><img loading="lazy" class="hidedesktop" src="<?php echo $image['banner_image_mobile']['url']; ?>" alt="<?php echo $image['banner_image_mobile']['alt']; ?>" /><?php } ?>
</section>

<a class="btn btn-default" href="#" data-featherlight="#banner-video" data-featherlight-iframe-allow="autoplay">Show video</a>

<div class="lightbox" id="banner-video">
	<iframe src="https://player.vimeo.com/video/219014507?autoplay=1&loop=1&autopause=0" width="100%" frameborder="0" allow="autoplay; fullscreen" allowfullscreen ></iframe>
</div>

<a class="btn btn-default" href="https://player.vimeo.com/video/219014507?autoplay=1&loop=1&autopause=0" data-featherlight="iframe" allow="autoplay; fullscreen" allowfullscreen > Show video inline</a>