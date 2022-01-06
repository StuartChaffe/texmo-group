<?php

add_filter( 'block_categories_all', 'texmo_block_categories', 10, 2 );
function texmo_block_categories( $categories, $post )
{
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'texmo-blocks',
				'title' => __( 'Texmo Blocks', 'texmoblocks-master' ),
			),
		)
	);
}

add_action('acf/init', 'texmo_acf_blocks');
function texmo_acf_blocks() {
	if( function_exists('acf_register_block') ) {
		acf_register_block(array(
			'name'				=> 'accordion',
			'title'				=> __('Accordion'),
			'description'		=> __('Add expanding content'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'insert',
			'align' 			=> 'wide',
			'keywords'			=> array( 'accordion, expanding' ),
		));
		acf_register_block(array(
			'name'				=> 'banner',
			'title'				=> __('Banner'),
			'description'		=> __('Add a banner block'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'format-image',
			'align' 			=> 'full',
			'keywords'			=> array( 'banner' ),
		));
		acf_register_block(array(
			'name'				=> 'carousel',
			'title'				=> __('Carousel'),
			'description'		=> __('Add a carousel'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'slides',
			'align' 			=> 'full',
			'keywords'			=> array( 'carousel' ),
		));
		acf_register_block(array(
			'name'				=> 'companies',
			'title'				=> __('Company links'),
			'description'		=> __('Add company links block'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'grid-view',
			'align' 			=> 'wide',
			'keywords'			=> array( 'link, links, company' ),
		));
		acf_register_block(array(
			'name'				=> 'content',
			'title'				=> __('Content'),
			'description'		=> __('Add a content block'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'format-aside',
			'align' 			=> 'wide',
			'mode' => 'auto',
			'keywords'			=> array( 'content' ),
		));
		acf_register_block(array(
			'name'				=> 'cta',
			'title'				=> __('Call to action'),
			'description'		=> __('Add a CTA block'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'megaphone',
			'align' 			=> 'wide',
			'keywords'			=> array( 'cta, call to action' ),
		));
		acf_register_block(array(
			'name'				=> 'featured-posts',
			'title'				=> __('Featured posts'),
			'description'		=> __('Add featured posts'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'screenoptions',
			'align' 			=> 'wide',
			'keywords'			=> array( 'posts, featured' ),
		));
		acf_register_block(array(
			'name'				=> 'icons',
			'title'				=> __('Icons list'),
			'description'		=> __('Add a list of icons'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'awards',
			'align' 			=> 'wide',
			'keywords'			=> array( 'icon, icons' ),
		));
		acf_register_block(array(
			'name'				=> 'link-block',
			'title'				=> __('Link block'),
			'description'		=> __('Add link block'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'grid-view',
			'align' 			=> 'wide',
			'keywords'			=> array( 'link, links' ),
		));
		acf_register_block(array(
			'name'				=> 'posts',
			'title'				=> __('Posts'),
			'description'		=> __('Add all posts'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'calendar-alt',
			'align' 			=> 'wide',
			'keywords'			=> array( 'posts, blogs' ),
		));
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Testimonial'),
			'description'		=> __('Add testimonial'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'format-status',
			'align' 			=> 'wide',
			'keywords'			=> array( 'testimonial, quote' ),
		));
		acf_register_block(array(
			'name'				=> 'text-image',
			'title'				=> __('Text with image'),
			'description'		=> __('Add a standard text with image block'),
			'render_callback'	=> 'texmo_acf_block_render_callback',
			'category'			=> 'texmo-blocks',
			'icon'				=> 'align-pull-right',
			'align' 			=> 'wide',
			'keywords'			=> array( 'content, text, image' ),
		));
	}
}

function texmo_acf_block_render_callback( $block ) {
	$slug = str_replace('acf/', '', $block['name']);

	if( file_exists( get_theme_file_path("/blocks/{$slug}.php") ) ) {
		include( get_theme_file_path("/blocks/{$slug}.php") );
	}
}

add_filter( 'allowed_block_types_all', 'texmo_allowed_block_types' );
 
function texmo_allowed_block_types( $allowed_blocks ) {
 
	return array(
		// 'acf/accordion',
		'acf/banner',
		// 'acf/carousel',
		'acf/content',
		'acf/companies',
		'acf/cta',
		// 'acf/featured-posts',
		'acf/icons',
		'acf/link-block',
		// 'acf/posts',
		'acf/testimonial',
		'acf/text-image',
	);
 
}
  
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field) {
	acf_render_field_setting( $field, array(
		'label'			=> 'Default Image',
		'instructions'		=> 'Appears when creating a new post',
		'type'			=> 'image',
		'name'			=> 'default_value',
	));
}
// add_action('acf/render_field_settings/type=file', 'add_default_value_to_file_field');
// function add_default_value_to_file_field($field) {
// 	acf_render_field_setting( $field, array(
// 		'label'			=> 'Default File',
// 		'instructions'		=> 'Appears when creating a new post',
// 		'type'			=> 'file',
// 		'name'			=> 'default_value',
// 	));
// }