<?php
/**
 * Plugin Name: Cursor Sample Plugin
 * Plugin URI: https://example.com
 * Description: Sample plugin with settings page, shortcode, and REST endpoint.
 * Version: 1.0.0
 * Author: Cursor
 * Author URI: https://example.com
 * Text Domain: cursor-sample-plugin
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'CSP_PLUGIN_FILE' ) ) {
	define( 'CSP_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'CSP_PLUGIN_DIR' ) ) {
	define( 'CSP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'CSP_PLUGIN_URL' ) ) {
	define( 'CSP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'CSP_PLUGIN_VERSION' ) ) {
	define( 'CSP_PLUGIN_VERSION', '1.0.0' );
}

/**
 * Activation callback.
 */
function csp_activate() {
	// Set a default message if it does not exist yet.
	if ( get_option( 'csp_message', null ) === null ) {
		add_option( 'csp_message', 'Hello from Cursor Sample Plugin!' );
	}
}

/**
 * Deactivation callback.
 */
function csp_deactivate() {
	// Nothing to do for now.
}

register_activation_hook( __FILE__, 'csp_activate' );
register_deactivation_hook( __FILE__, 'csp_deactivate' );

/**
 * Load plugin textdomain.
 */
function csp_load_textdomain() {
	load_plugin_textdomain( 'cursor-sample-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'csp_load_textdomain' );

// Includes.
require_once CSP_PLUGIN_DIR . 'includes/csp-settings.php';
require_once CSP_PLUGIN_DIR . 'includes/csp-shortcode.php';
require_once CSP_PLUGIN_DIR . 'includes/csp-rest.php';

/**
 * Add Settings link on the Plugins screen.
 *
 * @param string[] $links Existing links.
 * @return string[] Modified links.
 */
function csp_plugin_action_links( $links ) {
	$settings_url = admin_url( 'options-general.php?page=cursor-sample-plugin' );
	$settings_link = '<a href="' . esc_url( $settings_url ) . '">' . esc_html__( 'Settings', 'cursor-sample-plugin' ) . '</a>';
	array_unshift( $links, $settings_link );
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'csp_plugin_action_links' );

