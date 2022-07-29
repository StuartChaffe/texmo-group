<?php

add_action('init', 'origin_cpts');

function origin_cpts() {
	$post_type_name		= "stories";
	$single_name		= "Story";
	$plural_name		= "Stories";
	$icon				= "dashicons-format-status";
	$gutenberg_enabled	= true;

	$post_type_options = array(
	    'label'                 => $single_name,
	    'public'                => true,
	    'menu_icon'             => $icon,
	    'show_ui'               => true,
	    'show_in_menu'          => true,
	    'capability_type'       => 'post',
	    'hierarchical'          => true,
	    'rewrite'               => array(
	        'slug'                  => '',
	        'with_front'            => '0'
	    ),
	    'query_var'             => true,
	    'has_archive'           => false,
		'show_in_rest'			=> $gutenberg_enabled,
	    'supports'              => array(
	        'title',
	        'editor',
			'excerpt',
	        'revisions',
	        'thumbnail',
	        'author',
	        'page-attributes',
	    ),
	    'labels'                => array(
	        'name'                  => $single_name,
	        'singular_name'         => $single_name,
	        'menu_name'             => $plural_name,
	        'add_new'               => 'Add ' . $single_name,
	        'add_new_item'          => 'Add New ' . $single_name,
	        'edit'                  => 'Edit',
	        'edit_item'             => 'Edit ' . $single_name,
	        'new_item'              => 'New '. $single_name,
	        'view'                  => 'View '. $single_name,
	        'view_item'             => 'View '. $single_name,
	        'search_items'          => 'Search ' . $plural_name,
	        'not_found'             => 'No '. $plural_name . ' Found',
	        'not_found_in_trash'    => 'No '. $plural_name .' Found in Trash',
	        'parent'                => 'Parent '. $single_name
	    ),
	);
	register_post_type($post_type_name, $post_type_options);
	
	

	$post_type_name		= "companies";
	$single_name		= "Company";
	$plural_name		= "Companies";
	$icon				= "dashicons-store";
	$gutenberg_enabled	= false;
	
	$post_type_options = array(
		'label'                 => $single_name,
		'public'                => false,
		'menu_icon'             => $icon,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'capability_type'       => 'post',
		'hierarchical'          => true,
		'rewrite'               => array(
			'slug'                  => '',
			'with_front'            => '0'
		),
		'query_var'             => true,
		'has_archive'           => false,
		'show_in_rest'			=> $gutenberg_enabled,
		'supports'              => array(
			'title',
			'editor',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes',
		),
		'labels'                => array(
			'name'                  => $single_name,
			'singular_name'         => $single_name,
			'menu_name'             => $plural_name,
			'add_new'               => 'Add ' . $single_name,
			'add_new_item'          => 'Add New ' . $single_name,
			'edit'                  => 'Edit',
			'edit_item'             => 'Edit ' . $single_name,
			'new_item'              => 'New '. $single_name,
			'view'                  => 'View '. $single_name,
			'view_item'             => 'View '. $single_name,
			'search_items'          => 'Search ' . $plural_name,
			'not_found'             => 'No '. $plural_name . ' Found',
			'not_found_in_trash'    => 'No '. $plural_name .' Found in Trash',
			'parent'                => 'Parent '. $single_name
		),
	);
	register_post_type($post_type_name, $post_type_options);

	// $post_type_name		= "careers";
	// $single_name		= "Career";
	// $plural_name		= "Careers";
	// $icon				= "dashicons-groups";
	// $gutenberg_enabled	= false;
	
	// $post_type_options = array(
	//     'label'                 => $single_name,
	//     'public'                => true,
	//     'menu_icon'             => $icon,
	//     'show_ui'               => true,
	//     'show_in_menu'          => true,
	//     'capability_type'       => 'post',
	//     'hierarchical'          => true,
	//     'rewrite'               => array(
	//         'slug'                  => '',
	//         'with_front'            => '0'
	//     ),
	//     'query_var'             => true,
	//     'has_archive'           => false,
	// 	'show_in_rest'			=> $gutenberg_enabled,
	//     'supports'              => array(
	//         'title',
	//         'editor',
	// 		'excerpt',
	//         'revisions',
	//         'thumbnail',
	//         'author',
	//         'page-attributes',
	//     ),
	//     'labels'                => array(
	//         'name'                  => $single_name,
	//         'singular_name'         => $single_name,
	//         'menu_name'             => $plural_name,
	//         'add_new'               => 'Add ' . $single_name,
	//         'add_new_item'          => 'Add New ' . $single_name,
	//         'edit'                  => 'Edit',
	//         'edit_item'             => 'Edit ' . $single_name,
	//         'new_item'              => 'New '. $single_name,
	//         'view'                  => 'View '. $single_name,
	//         'view_item'             => 'View '. $single_name,
	//         'search_items'          => 'Search ' . $plural_name,
	//         'not_found'             => 'No '. $plural_name . ' Found',
	//         'not_found_in_trash'    => 'No '. $plural_name .' Found in Trash',
	//         'parent'                => 'Parent '. $single_name
	//     ),
	// );
	// register_post_type($post_type_name, $post_type_options);
}

function get_careers_from_api() {
	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
	$careers = [];
	$results = wp_remote_get('https://api-qa.texmo.com/api/recruitment-management/jobs');
}