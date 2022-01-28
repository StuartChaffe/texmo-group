<?php
/**
* The template used for displaying a featured stories block.
*/
$title = get_field('featured_posts_title');
$featuredposts = get_field( 'select_posts' );
?>

<section class="bkg--grey" style="height: 300px; display: flex; align-items: center; justify-content: center;">
	<h2>Featured Stories</h2>
</section>