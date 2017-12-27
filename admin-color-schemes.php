<?php
/**
 * Plugin Name: Asteriski admin theme
 * Plugin URI: http://asteriski.fi
 * Description: Hallintapaneelin ulkoasua hieman Asteriskimmaksi
 * Version: 1.0
 * Author: Maks Turtiainen
 * Author URI: http://asteriski.fi
 * License: GPLv2
 */

/*
Original version published with GPLv2 by Kelly Dwan, Mel Choyce, Dave Whitley, Kate Whitley
Changes by Maks Turtiainen 
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* Korvataan kulmassa oleva Wordpressin logo Asteriskin logolla */
function asteriski_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before { 
background-image: url(' . get_bloginfo('stylesheet_directory') . '/admin-logo.png)  !important; 
color: transparent;
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}   
 </style>
';
}


/* Väriteema */
class ACS_Color_Schemes {

	/**
	 * List of colors registered in this plugin.
	 *
	 * @since 1.0
	 * @access private
	 * @var array $colors List of colors registered in this plugin.
	 *                    Needed for registering colors-fresh dependency.
	 */
	private $colors = array(
		'asteriski',
	);

	function __construct() {
		add_action( 'admin_init' , array( $this, 'add_colors' ) );
        add_action('wp_before_admin_bar_render', 'asteriski_custom_logo');
	}

	/**
	 * Register color scheme.
	 */
	function add_colors() {
		$suffix = is_rtl() ? '-rtl' : '';

		wp_admin_css_color(
			'asteriski', __( 'Asteriski', 'admin_schemes' ),
			plugins_url( "asteriski/colors$suffix.css", __FILE__ ),
			array( '#286e33', '#c19a12', '#d66621', '#348d42' ),
			array( 'base' => '#286e33', 'focus' => '#c19a12', 'current' => '#d66621' )
		);
	}


}
global $acs_colors;
$acs_colors = new ACS_Color_Schemes;
?>


