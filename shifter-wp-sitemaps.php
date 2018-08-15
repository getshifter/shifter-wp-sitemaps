<?php
/*
Plugin Name: Shifter WP Sitemaps
Plugin URI: https://github.com/getshifter/shifter-wp-sitemaps
Description: Helper functions for WordPress sitemaps plugins on Shifter
Version: 0.1.0
Author: DigitalCube
Author URI: https://getshifter.io
License: GPL-2.0
*/

/**
 * It's a Trap
 * -----------
 * Abort if called directly or by a script
 *
 * @since  0.1.0
 */

 if ( ! defined( ‘ABSPATH’ ) )
  exit;

/**
 * Yoast SEO
 * ---------
 * Add path for Yoast SEO sitemap_index.xml to WordPress Robots.txt
 *
 * @since  0.1.0
 */

function surbma_yoast_seo_sitemap_to_robotstxt_function( $output ) {
  
  $options = get_option( 'wpseo_xml' );
  
  if ( class_exists( 'WPSEO_Sitemaps' ) && $options['enablexmlsitemap'] == true ) {
		$homeURL = get_home_url();
    $output .= "Sitemap: $homeURL/sitemap_index.xml\n";
	}
  
  return $output;
}

add_filter( 'robots_txt', 'surbma_yoast_seo_sitemap_to_robotstxt_function', 9999, 1 );