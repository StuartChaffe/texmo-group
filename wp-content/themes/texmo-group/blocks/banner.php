<?php
/**
* The template used for displaying a banner.
*/
$image = get_field('banner_image');
$video = get_field('banner_video');
$content = get_field('banner_content');
?>

<section class="fade banner" <?php if ( $image['banner_image_large'] ) { ?>style="background-image: url('<?php echo $image['banner_image_large']['url']; ?>')"<?php } ?>>
<?php if ( $image ) { ?><?php if ( $image['banner_image_overlay'] ) { ?><div class="banner--overlay" style="background-color: rgba(0,0,0,0.<?php echo $image['banner_image_overlay'] ?>);">&nbsp;</div><?php } ?><?php } ?>
	<?php if ( $video['banner_video_image'] ) { ?><div class="banner--video-image fade" style="background-image: url('<?php echo $video['banner_video_image']['url']; ?>')"><img loading="lazy" src="<?php echo $video['banner_video_image']['url']; ?>" alt="<?php echo $video['banner_video_image']['alt']; ?>" /></div><?php } ?>
	<?php if ( $content ) { ?>
		<div class="banner--content fade fade--delay__1 <?php if ( $video['banner_video_image'] ) { ?>banner--content-video<?php } ?>">
		<?php echo $content ?>
		<?php if ( $video['banner_video_id'] ) { ?>
			<a class="btn-video" href="https://player.vimeo.com/video/<?php echo $video['banner_video_id'] ?>?autoplay=1&loop=1&autopause=0?muted=1" data-featherlight="iframe" allow="autoplay; fullscreen" allowfullscreen ><svg class="icon icon--play"><use xlink:href="#play"></use></svg> <?php echo $video['banner_video_text']; ?></a>
		<?php } ?>

		<!--testing -->
		<a href="#" id="#banner-videoo" data-featherlight="#banner-videoo" data-featherlight-iframe-allow="autoplay"><?php echo $video['banner_video_text']; ?></a>
		<!--testing end -->
		</div>
	<?php } ?>
	<?php if ( $image['banner_image_large'] ) { ?><img loading="lazy" class="banner--image hidemobile" src="<?php echo $image['banner_image_large']['url']; ?>" alt="<?php echo $image['banner_image_large']['alt']; ?>" /><?php } ?>
	<?php if ( $image['banner_image_mobile'] ) { ?><img loading="lazy" class="banner--image hidedesktop" src="<?php echo $image['banner_image_mobile']['url']; ?>" alt="<?php echo $image['banner_image_mobile']['alt']; ?>" /><?php } ?>
</section>

<!--testing -->
<div class="lightbox" id="banner-videoo">
<video id="video1" style="width:100%;max-width:100%;" controls="">
	<source src="http://texmo-group.local/wp-content/uploads/mov_bbb.mp4" type="video/mp4">
	Your browser does not support HTML5 video.
</video>
</div>
<!--testing end -->


<a style="display: none" href="#" data-featherlight="#banner-video" data-featherlight-iframe-allow="autoplay"><?php echo $video['banner_video_text']; ?></a>

<div class="lightbox" id="banner-video" style="display: none">
    <iframe src="https://player.vimeo.com/video/219014507?autoplay=1&loop=1&autopause=0" width="100%" frameborder="0" allow="autoplay; fullscreen" allowfullscreen ></iframe>
</div>
