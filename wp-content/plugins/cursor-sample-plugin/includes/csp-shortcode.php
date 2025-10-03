<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register frontend assets.
 */
function csp_register_frontend_assets() {
	wp_register_style( 'csp-frontend', CSP_PLUGIN_URL . 'assets/css/frontend.css', array(), CSP_PLUGIN_VERSION );
}
add_action( 'wp_enqueue_scripts', 'csp_register_frontend_assets' );

/**
 * Shortcode handler for [cursor_sample].
 *
 * @param array $atts Shortcode attributes.
 * @return string HTML output.
 */
function csp_shortcode_render( $atts ) {
	wp_enqueue_style( 'csp-frontend' );
	$message = get_option( 'csp_message', 'Hello from Cursor Sample Plugin!' );
	return '<div class="csp-message">' . esc_html( $message ) . '</div>';
}
add_shortcode( 'cursor_sample', 'csp_shortcode_render' );

