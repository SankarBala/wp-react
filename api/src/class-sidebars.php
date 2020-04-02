<?php


namespace WP_API_Sidebars;

use WP_Autoloader;

/**
 * Class Sidebars
 *
 * @package WP_API_Sidebars
 */
final class Sidebars {
    /**
     * The API endpoint namespace
     *
     * @var string
     */
    const ENDPOINT_NAMESPACE = 'wp/v2';

    /**
     * The plugins autoloader
     *
     * @var WP_Autoloader
     */
    private $autoloader;

    /**
     * A single instance of this class
     *
     * @var Sidebars
     */
    private static $instance = null;

    /**
     * @constructor
     *
     * @param WP_Autoloader $autoloader
     */
    private function __construct( WP_Autoloader $autoloader ) {
        $this->autoloader = $autoloader;
    }

    /**
     * Returns a single instance of this class
     *
     * @param WP_Autoloader|null $loader
     *
     * @return Sidebars
     */
    public static function get_instance( WP_Autoloader $loader = null ) {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self( $loader );
        }

        return self::$instance;
    }

    /**
     * Returns the plugins autoloader
     *
     * @return WP_Autoloader
     */
    public function get_autoloader() {
        return $this->autoloader;
    }

    /**
     * Runs at the "plugins_loaded" hook
     *
     * @return null
     */
    public function load() {
        add_action( 'rest_api_init', function () {
            // instantiate controllers
            $sidebars_controller = new Controllers\Sidebars_Controller;
            $widgets_controller = new Controllers\Widgets_Controller;

            // register controller routes
            $sidebars_controller->register_routes();
            $widgets_controller->register_routes();
        } );
    }
}

