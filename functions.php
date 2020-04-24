<?php
add_theme_support('title-tag');

add_theme_support('post-thumbnails');

$defaults = array(
    'default-color' => '',
    'default-image' => '',
    'default-repeat' => 'repeat',
    'default-position-x' => 'left',
    'default-position-y' => 'top',
    'default-size' => 'auto',
    'default-attachment' => 'scroll',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
);
add_theme_support('custom-background', $defaults);

add_theme_support('custom-logo');

register_nav_menus(array(
    'topmenu' => __('Top Menu', ''),
    'navmenu' => __('Navigation Menu', ''),
    'socialmenu' => __('Social Menu', ''),
    'footermenu' => __('Footer Menu', '')
));



function theme_widgets_init() {

  
		register_sidebar( array(
			'name'          => esc_html__( 'Topbar Widget Area', 'wp_react_theme' ),
			'id'            => 'topbar',
			'description'   => esc_html__( 'This widget will be shown in topbar of the page.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
			) );
			
		register_sidebar( array(
			'name'          => esc_html__( 'Banner Widget Area', 'wp_react_theme' ),
			'id'            => 'banner',
			'description'   => esc_html__( 'This widget will be shown in banner inside header section.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
			) );

		register_sidebar( array(
			'name'          => esc_html__( 'Facebook widget', 'wp_react_theme' ),
			'id'            => 'facebook-page',
			'description'   => esc_html__( 'Add facebook page code here.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Breadcum widget', 'wp_react_theme' ),
			'id'            => 'breadcum-nav',
			'description'   => esc_html__( 'Add bredcum here', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );
		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar 1 - 1/3 Widget Area', 'wp_react_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar 2 - 2/3 Widget Area', 'wp_react_theme' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar 3 - 3/3 Widget Area', 'wp_react_theme' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );
		
			register_sidebar( array(
			'name'          => esc_html__( 'Footer 1 - 1/3 Widget Area', 'wp_react_theme' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 2 - 2/3 Widget Area', 'wp_react_theme' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 3 - 3/3 Widget Area', 'wp_react_theme' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 4 - 4/4 Widget Area', 'wp_react_theme' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 5 - 5/5 Widget Area', 'wp_react_theme' ),
			'id'            => 'footer-5',
			'description'   => esc_html__( 'Add widgets here.', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Category widget 4', 'wp_react_theme' ),
			'id'            => 'category-4',
			'description'   => esc_html__( 'Category widget 4', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Page start widget 5', 'wp_react_theme' ),
			'id'            => 'page-start',
			'description'   => esc_html__( 'Page start widget 5', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Page middle widget 5', 'wp_react_theme' ),
			'id'            => 'page-middle',
			'description'   => esc_html__( 'Page middle widget 5', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Page end widget 5', 'wp_react_theme' ),
			'id'            => 'page-end',
			'description'   => esc_html__( 'Page end widget 5', 'wp_react_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );
}


add_action( 'widgets_init', 'theme_widgets_init' );


// Post view counter;

function get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count";
}

function set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}

function posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}

function posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo get_post_view();
    };
}

// Additional api to get menu, sidebar and widget data which is not provided to wordpress;

include "api/widget.php";
include "api/menu.php";
include "api/logo.php";
