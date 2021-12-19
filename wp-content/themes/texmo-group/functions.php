<?php

// Set theme defaults, tidy up WP
require_once( 'lib/theme-setup.php' );

// Load scrips
require_once( 'lib/enqueue.php' );

// Images
require_once( 'lib/images.php' );

// Configure menus
require_once( 'lib/menus.php' );

// ACF configuration
require_once( 'lib/acf.php' );

// Custom Gutenberg blocks
require_once( 'lib/blocks.php' );

// Vendor specific functions
require_once( 'lib/vendors.php' );

// Helper functions
require_once( 'lib/helpers.php' );


function add_style_select_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'add_style_select_buttons' );

//add custom styles to the WordPress editor
function my_custom_styles( $init_array ) {  

	$style_formats = array(  
		// These are the custom styles
		array(  
			'title' => 'Paragraph lead',  
			'block' => 'p',  
			'classes' => 'lead',
			'wrapper' => false,
		), 
		array(  
			'title' => 'Button',  
			'block' => 'span',  
			'classes' => 'btn',
			'wrapper' => false,
		),  
		array(  
			'title' => 'Content Block',  
			'block' => 'span',  
			'classes' => 'content-block',
			'wrapper' => true,
		),
		array(  
			'title' => 'Highlighter',  
			'block' => 'span',  
			'classes' => 'highlighter',
			'wrapper' => true,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  

	return $init_array;  

	} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_custom_styles' );


function my_login_logo() { ?>
	<style type="text/css">
		#login h1 a, .login h1 a {
		background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/src/images/logo.svg);
		height: 49px;
		width: 121px;
		background-size: 121px 49px;
		background-repeat: no-repeat;
			padding-bottom: 30px;
		}
		.wp-core-ui .button-primary {
			background: #E55E20 !important;
			background-color: #E55E20 !important;
			border: 0 !important;
		}
		.wp-core-ui .button.button-large {
			padding: 5px 22px !important;
			border-radius: 0;
			font-size: 16px !important;
		}
		a {
			color: #fff !important;
		}
		.privacy-policy-page-link {
			display: none;
		}
		.login-action-login {
			display: flex;
    		flex-direction: column;
			color: white;
			background-color: #424244 !important;
		}
		.login label {
			font-size: 16px !important;
		}
		.login form {
			padding: 0px !important; 
			background: transparent !important;
			border: 0 !important;
			box-shadow: none !important;
		}
		#login {
			/* width: 370px !important; */
			padding: 0 !important;
		}
		.login #nav,
		.login #backtoblog {
			padding: 0 !important;
		}
		#login input[type=text],
		#login input[type=password] {
			border-radius: 0 !important;
			border: 0 !important;
			padding: 10px 10px !important;
			box-shadow: none !important;
		}
		.login .button.wp-hide-pw .dashicons {
			top: 10px !important;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );