<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register plugin settings, section and fields.
 */
function csp_register_settings() {
	register_setting(
		'csp_settings_group',
		'csp_message',
		array(
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => 'Hello from Cursor Sample Plugin!',
		)
	);

	add_settings_section(
		'csp_main_section',
		'',
		'__return_false',
		'cursor-sample-plugin'
	);

	add_settings_field(
		'csp_message',
		__( 'Message', 'cursor-sample-plugin' ),
		'csp_message_field_render',
		'cursor-sample-plugin',
		'csp_main_section'
	);
}
add_action( 'admin_init', 'csp_register_settings' );

/**
 * Render the message field.
 */
function csp_message_field_render() {
	$value = get_option( 'csp_message', '' );
	echo '<input type="text" class="regular-text" name="csp_message" value="' . esc_attr( $value ) . '" />';
	echo '<p class="description">' . esc_html__( 'Text displayed by the shortcode and REST endpoint.', 'cursor-sample-plugin' ) . '</p>';
}

/**
 * Add the settings page under Settings.
 */
function csp_add_settings_page() {
	add_options_page(
		esc_html__( 'Cursor Sample', 'cursor-sample-plugin' ),
		esc_html__( 'Cursor Sample', 'cursor-sample-plugin' ),
		'manage_options',
		'cursor-sample-plugin',
		'csp_settings_page_render'
	);
}
add_action( 'admin_menu', 'csp_add_settings_page' );

/**
 * Enqueue admin-only assets on our settings page.
 *
 * @param string $hook Current admin page hook suffix.
 */
function csp_admin_assets( $hook ) {
	if ( $hook !== 'settings_page_cursor-sample-plugin' ) {
		return;
	}
	wp_enqueue_style( 'csp-admin', CSP_PLUGIN_URL . 'assets/css/admin.css', array(), CSP_PLUGIN_VERSION );
}
add_action( 'admin_enqueue_scripts', 'csp_admin_assets' );

/**
 * Render the settings page markup.
 */
function csp_settings_page_render() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php echo esc_html__( 'Cursor Sample Plugin', 'cursor-sample-plugin' ); ?></h1>
		<form action="options.php" method="post">
			<?php settings_fields( 'csp_settings_group' ); ?>
			<?php do_settings_sections( 'cursor-sample-plugin' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

