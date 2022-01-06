<?php
/**
* The template used for displaying a companies links block.
*/
$title = get_field('title');
?>

<section class="companies bkg--darkgrey">
	<div class="companies--title">
		<h2><?php echo $title; ?></h2>
	</div>
	<?php if( have_rows('links') ) { ?>
	<div class="companies-list">
		<?php while( have_rows('links') ): the_row();
			$image = get_sub_field('company_image');
			$link = get_sub_field('link');
			$url = $link['company_link'];
			$linktext = $link['company_link_text'];
		?>

		<a class="companies-list-item" href="<?php echo $url['url']; ?>">
			<?php if ( $image ) { ?><div class="companies-list-item--image"><img loading="lazy" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div><?php } ?>
			<?php if ( $linktext ) { ?>
				<p><?php echo $linktext; ?></p>
			<?php } elseif ( $url['title'] ) { ?>
				<p><?php echo $url['title']; ?></p>
			<?php } ?>
			<span>↳</span>
		</a>
		<?php endwhile; ?>
	</div>
	<?php } ?>
</section>