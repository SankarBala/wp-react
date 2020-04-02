<?php

// exit if accessed directly
defined( 'ABSPATH' ) || die;


defined( 'WP_VERSION' ) || define( 'WP_VERSION', get_bloginfo( 'version' ) );
define( 'WP_REST_API_SIDEBARS_REQUIRED_PHP_VERSION', '5.4.0' );
define( 'WP_REST_API_SIDEBARS_REQUIRED_WP_VERSION', '4.4' );
define( 'WP_REST_API_SIDEBARS_ROOT_DIR', dirname( __FILE__ ) );
define( 'WP_REST_API_SIDEBARS_ROOT_DIR_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
define( 'WP_REST_API_SIDEBARS_ROOT_FILE', __FILE__ );
define( 'WP_REST_API_SIDEBARS_PLUGIN_BASENAME', plugin_basename( WP_REST_API_SIDEBARS_ROOT_FILE ) );
define( 'WP_REST_API_SIDEBARS_VERSION', '0.1.1' );

// make sure we have a compatible environment
if (
    version_compare( PHP_VERSION, WP_REST_API_SIDEBARS_REQUIRED_PHP_VERSION, '<' ) ||
    version_compare( WP_VERSION, WP_REST_API_SIDEBARS_REQUIRED_WP_VERSION, '<' )
) {
    add_action( 'admin_notices', 'wp_rest_api_sidebars_display_incompatible_environment_message' );
    add_action( 'admin_init', 'wp_rest_api_sidebars_deactivate_plugin' );

    return;
}

// setup autoloader
if ( ! class_exists( 'WP_Autoloader' ) ) {
    require_once WP_REST_API_SIDEBARS_ROOT_DIR . '/lib/wp-autoloader/class-wp-autoloader.php';
}

$loader = new WP_Autoloader;
$loader->add_namespace( 'WP_API_Sidebars', WP_REST_API_SIDEBARS_ROOT_DIR . '/src' );
$loader->register();

$wp_rest_api_sidebars = WP_API_Sidebars\Sidebars::get_instance( $loader );

// plug it in
add_action( 'widgets_init', [ $wp_rest_api_sidebars, 'load' ] );

/**
 * Deactivates the plugin
 *
 * @return null
 */
function wp_rest_api_sidebars_deactivate_plugin() {
    deactivate_plugins( WP_REST_API_SIDEBARS_PLUGIN_BASENAME );
}

/**
 * Displays the "Incompatible environment" admin message
 *
 * @return null
 */
function wp_rest_api_sidebars_display_incompatible_environment_message() {
    include WP_REST_API_SIDEBARS_ROOT_DIR . '/templates/messages/incompatible-environment.php';
}

