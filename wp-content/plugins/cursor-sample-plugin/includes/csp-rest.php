<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register REST API routes.
 */
function csp_register_rest_routes() {
	register_rest_route(
		'csp/v1',
		'/message',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'permission_callback' => '__return_true',
			'callback'            => 'csp_rest_get_message',
		)
	);
}
add_action( 'rest_api_init', 'csp_register_rest_routes' );

/**
 * REST callback to return the configured message.
 *
 * @param WP_REST_Request $request Request.
 * @return WP_REST_Response
 */
function csp_rest_get_message( $request ) {
	$message = get_option( 'csp_message', 'Hello from Cursor Sample Plugin!' );
	return new WP_REST_Response( array( 'message' => $message ), 200 );
}

