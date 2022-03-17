<?php
/*
Plugin Name: Five9 - Modal
Plugin URI: https://github.com/nickdavis/five9-modal
Description: Adds 'click to open' functionality for Five9 chat. Requires the official Five9 WordPress plugin or the Five9 chat widget scripts to be loaded in some other way.
Author: Nick Davis
Version: 1.0.0
Author URI: https://nickdavis.net
*/

namespace NickDavis\Five9Modal;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\constants' );
/**
 * Sets up the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function constants() {
	$plugin_url = plugin_dir_url( __FILE__ );

	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'ND_FIVE9_MODAL_VERSION', '1.0.0' );
	define( 'ND_FIVE9_MODAL_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
	define( 'ND_FIVE9_MODAL_URL', $plugin_url );
	define( 'ND_FIVE9_MODAL_FILE', __FILE__ );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_script' );
/**
 * Enqueues the plugin JavaScript.
 *
 * For more information, see page 106 from the Digital Admin Guide at the
 * following link.
 *
 * @url https://webapps.five9.com/assets/files/for_customers/documentation/vcc-applications/administrator/digital-engagement-administrators-guide.pdf
 *
 * @return void
 */
function enqueue_script(): void {
	$js_path    = '/js/five9-modal.js';
	$js_uri     = ND_FIVE9_MODAL_URL . $js_path;
	$js_version = filemtime( ND_FIVE9_MODAL_DIR . $js_path );

	wp_enqueue_script( 'nd-five9-modal', $js_uri, [ 'jquery' ], $js_version );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_styles' );
/**
 * Enqueues the plugin CSS.
 *
 * For more information, see page 106 from the Digital Admin Guide at the
 * following link.
 *
 * @url https://webapps.five9.com/assets/files/for_customers/documentation/vcc-applications/administrator/digital-engagement-administrators-guide.pdf
 *
 * @return void
 */
function enqueue_styles(): void {
	$css_path    = '/css/five9-modal.css';
	$css_uri     = ND_FIVE9_MODAL_URL . $css_path;
	$css_version = filemtime( ND_FIVE9_MODAL_DIR . $css_path );

	wp_enqueue_style( 'nd-five9-modal', $css_uri, [], $css_version );
}
