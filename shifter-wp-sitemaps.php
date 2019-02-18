<?php
/**
 * Sitemap
 *
 * Helper functions for sitemap WordPress plugins on Shifter
 *
 * @package shifter-wp-sitemaps
 *
 * @wordpress-plugin
 * Plugin Name: Shifter WP Sitemaps
 * PHP Version: 7
 * Plugin URI: https://github.com/getshifter/shifter-wp-sitemaps
 * Description: Helper functions for sitemap WordPress plugins on Shifter
 * Version: 1.0.0
 * Author: DigitalCube
 * Author URI: https://getshifter.io
 * License: GPL-2.0
 */

/**
 * Implements hook_help().
 *
 * @param string $output Adds Sitemap URL to Robots.txt.
 */
function shifter_wp_sitemaps_yoast( $output ) {
	$options = get_option( 'wpseo_xml' );

	if ( class_exists( 'WPSEO_Sitemaps' ) && true === $options['enablexmlsitemap'] ) {
		$home_url = get_home_url();
		$output  .= "Sitemap: $home_url/sitemap_index.xml\n";
	}
	return $output;
}

add_filter( 'robots_txt', 'shifter_wp_sitemaps_yoast', 9999, 1 );
