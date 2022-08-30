<?php
/**
* The template used for displaying a banner.
*/
$image = get_field('banner_image');
$video = get_field('banner_video');
$content = get_field('banner_content');
$size = get_field('banner_size');
?>

<section class="fade banner<?php if ( $size == 'Small' ) { ?> banner__small<?php } ?>" <?php if ( $image['banner_image_large'] ) { ?>style="background-image: url('<?php echo $image['banner_image_large']['url']; ?>')"<?php } ?>>
<?php if ( $image ) { ?><?php if ( $image['banner_image_overlay'] ) { ?><div class="banner--overlay" style="background-color: rgba(0,0,0,0.<?php echo $image['banner_image_overlay'] ?>);">&nbsp;</div><?php } ?><?php } ?>
	<?php if ( $video['banner_video_image'] ) { ?><div class="banner--video-image fade" style="background-image: url('<?php echo $video['banner_video_image']['url']; ?>')"><img loading="lazy" src="<?php echo $video['banner_video_image']['url']; ?>" alt="<?php echo $video['banner_video_image']['alt']; ?>"<?php if ( $video['banner_video_mobile_image'] ) { ?> class="hidemobile"<?php } ?>/> <?php if ( $video['banner_video_mobile_image'] ) { ?><img loading="lazy" src="<?php echo $video['banner_video_mobile_image']['url']; ?>" alt="<?php echo $video['banner_video_mobile_image']['alt']; ?>" class="hidedesktop" /><?php } ?> </div><?php } ?>
	<?php if ( $content ) { ?>
		<div class="banner--content fade fade--delay__1 <?php if ( $video['banner_video_image'] ) { ?>banner--content-video<?php } ?>">
		<?php echo $content ?>
		<?php if ( $video['banner_video_id'] ) { ?>
			<a class="btn-video" href="https://player.vimeo.com/video/<?php echo $video['banner_video_id'] ?>?autoplay=1&loop=1&autopause=0?muted=1" data-featherlight="iframe" allow="autoplay; fullscreen" allowfullscreen ><svg class="icon icon--play"><use xlink:href="#play"></use></svg> <?php echo $video['banner_video_text']; ?></a>
		<?php } ?>
		</div>
	<?php } ?>
	<?php if ( $image['banner_image_large'] ) { ?><img loading="lazy" class="banner--image hidemobile" src="<?php echo $image['banner_image_large']['url']; ?>" alt="<?php echo $image['banner_image_large']['alt']; ?>" /><?php } ?>
	<?php if ( $image['banner_image_mobile'] ) { ?><img loading="lazy" class="banner--image hidedesktop" src="<?php echo $image['banner_image_mobile']['url']; ?>" alt="<?php echo $image['banner_image_mobile']['alt']; ?>" /><?php } ?>
</section>