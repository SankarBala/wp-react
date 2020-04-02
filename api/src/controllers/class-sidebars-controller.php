<?php


namespace WP_API_Sidebars\Controllers;

use InvalidArgumentException;
use WP_REST_Controller;
use WP_REST_Server;
use WP_REST_Request;
use WP_REST_Response;
use WP_Error;
use WP_API_Sidebars\Sidebars;

/**
 * Class Sidebars_Controller
 *
 * @package WP_API_Sidebars\Controllers
 */
class Sidebars_Controller extends WP_REST_Controller {
    /**
     * Registers the controllers routes
     *
     * @return null
     */
    public function register_routes() {
        // lists all sidebars
        register_rest_route( Sidebars::ENDPOINT_NAMESPACE, '/sidebars', [
            [
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => [ $this, 'get_items' ],
            ],
        ] );

        // lists a single sidebar based on the given id
        register_rest_route( Sidebars::ENDPOINT_NAMESPACE, '/sidebars/(?P<id>[\w-]+)', [
            [
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => [ $this, 'get_item' ],
                'args'                => [
                    'id' => [
                        'description' => 'The id of a registered sidebar',
                        'type' => 'string',
                        'validate_callback' => function ( $id ) {
                            return ! is_null( self::get_sidebar( $id ) );
                        }
                    ],
                ],
            ],
        ] );
    }

    /**
     * Returns a list of sidebars (active or inactive)
     *
     * @global array $wp_registered_sidebars
     *
     * @param WP_REST_Request $request
     *
     * @return WP_REST_Response
     */
    public function get_items( $request ) {
        // do type checking here as the method declaration must be compatible with parent
        if ( ! $request instanceof WP_REST_Request ) {
            throw new InvalidArgumentException( __METHOD__ . ' expects an instance of WP_REST_Request' );
        }

        global $wp_registered_sidebars;

        $sidebars = [];

        foreach ( (array) wp_get_sidebars_widgets() as $id => $widgets ) {
            $sidebar = compact( 'id', 'widgets' );

            if ( isset( $wp_registered_sidebars[ $id ] ) ) {
                $registered_sidebar = $wp_registered_sidebars[ $id ];

                $sidebar['status'] = 'active';
                $sidebar['name'] = $registered_sidebar['name'];
                $sidebar['description'] = $registered_sidebar['description'];
            } else {
                $sidebar['status'] = 'inactive';
            }

            $sidebars[] = $sidebar;
        }

        return new WP_REST_Response( $sidebars, 200 );
    }

    /**
     * Returns the given sidebar
     *
     * @param WP_REST_Request $request
     *
     * @return WP_REST_Response
     */
    public function get_item( $request ) {
        // do type checking here as the method declaration must be compatible with parent
        if ( ! $request instanceof WP_REST_Request ) {
            throw new InvalidArgumentException( __METHOD__ . ' expects an instance of WP_REST_Request' );
        }

        $sidebar = self::get_sidebar( $request->get_param( 'id' ) );

        $sidebar['widgets'] = self::get_widgets( $sidebar['id'] );

        ob_start();
        dynamic_sidebar( $request->get_param( 'id' ) );
        $sidebar['rendered'] = ob_get_clean();

        return new WP_REST_Response( $sidebar, 200 );
    }

    /**
     * Returns a sidebar for the given id or null if not found
     *
     * Note: The id can be either an index, the id or the name of a sidebar
     *
     * @global array $wp_registered_sidebars
     *
     * @param string $id
     *
     * @return array|null
     */
    public static function get_sidebar( $id ) {
        global $wp_registered_sidebars;

        if ( is_int( $id ) ) {
            $id = 'sidebar-' . $id;
        } else {
            $id = sanitize_title( $id );

            foreach ( (array) $wp_registered_sidebars as $key => $sidebar ) {
                if ( sanitize_title( $sidebar['name'] ) == $id ) {
                    return $sidebar;
                }
            }
        }

        foreach ( (array) $wp_registered_sidebars as $key => $sidebar ) {
            if ( $key === $id ) {
                return $sidebar;
            }
        }

        return null;
    }

    /**
     * Returns a list of widgets for the given sidebar id
     *
     * @global array $wp_registered_widgets
     * @global array $wp_registered_sidebars
     *
     * @param string $sidebar_id
     *
     * @return array
     */
    public static function get_widgets( $sidebar_id ) {
        global $wp_registered_widgets, $wp_registered_sidebars;

        $widgets = [];
        $sidebars_widgets = (array) wp_get_sidebars_widgets();

        if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) && isset( $sidebars_widgets[ $sidebar_id ] ) ) {
            foreach ( $sidebars_widgets[ $sidebar_id ] as $widget_id ) {
                // just to be sure
                if ( isset( $wp_registered_widgets[ $widget_id ] ) ) {
                    $widget = $wp_registered_widgets[ $widget_id ];

                    // get the widget output
                    if ( is_callable( $widget['callback'] ) ) {
                        // @note: everything up to ob_start is taken from the dynamic_sidebar function
                        $widget_parameters = array_merge(
                            [
                                array_merge( $wp_registered_sidebars[ $sidebar_id ], [
                                    'widget_id' => $widget_id,
                                    'widget_name' => $widget['name'],
                                ] )
                            ],
                            (array) $widget['params']
                        );

                        $classname = '';
                        foreach ( (array) $widget['classname'] as $cn ) {
                            if ( is_string( $cn ) )
                                $classname .= '_' . $cn;
                            elseif ( is_object( $cn ) )
                                $classname .= '_' . get_class( $cn );
                        }
                        $classname = ltrim( $classname, '_' );
                        $widget_parameters[0]['before_widget'] = sprintf( $widget_parameters[0]['before_widget'], $widget_id, $classname );

                        ob_start();

                        call_user_func_array( $widget['callback'], $widget_parameters );

                        $widget['rendered'] = ob_get_clean();
                    }

                    unset( $widget['callback'] );
                    unset( $widget['params'] );

                    $widgets[] = $widget;
                }
            }
        }

        return $widgets;
    }
}

