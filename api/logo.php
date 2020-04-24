<?php


if ( ! defined( 'ABSPATH' ) ) {
  exit; 
}


if ( ! class_exists( 'WP_REST_API_logo' ) ) :


  
  class WP_REST_API_logo {


    public function register_routes() {

      register_rest_route( 'wp/v2', '/logo', array(
          array(
            'methods'  => WP_REST_Server::READABLE,
            'callback' => array( $this, 'get_logo' )
          )
        )
      );
    }


    
    public static function get_logo() {

      // $rest_url = trailingslashit( get_rest_url() . 'wp-rest-api-static/v2' . '/logo/' );

      if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo_meta = wp_get_attachment_image_src($custom_logo_id,'full');
        $output = json_decode('{
          "logo": ' . true . ', 
          "attachment_id": ' . $custom_logo_id . ', 
          "logo_url": "' . $logo_meta[0] . '",
          "site_title": "'. get_bloginfo("title") .'",
          "tag_line": "'. get_bloginfo("description") .'"
        }');
      } else {
        $output = json_decode('{
          "logo": ' . "false" . ', 
          "attachment_id": ' . "null" . ', 
          "logo_url": "' . "". '",
          "site_title": "'. get_bloginfo("title") .'",
          "tag_line": "'. get_bloginfo("description") .'"
        }');
      }

      return new WP_REST_Response( $output, 200 );
    }
  }

endif;


if ( ! function_exists ( 'get_logo' ) ) :

 
  function get_logo() {
    $class = new WP_REST_API_logo();
    add_filter( 'rest_api_init', array( $class, 'register_routes' ) );
  }

  add_action( 'init', 'get_logo' );

endif;
