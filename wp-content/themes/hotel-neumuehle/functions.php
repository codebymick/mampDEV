<?php

// SETUP
if(!function_exists('hotelneumuehle_setup')) :
function hotelneumuehle_setup() {
 
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain('hotel-neumuehle', get_template_directory().'/languages');
 
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support('post-thumbnails');
 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus(
		array(
			'main-left' => __('Hauptmenü links', 'hotel-neumuehle'),
			'main-right' => __('Hauptmenü rechts', 'hotel-neumuehle'),
			'restaurant' => __('Restaurant', 'hotel-neumuehle'),
            'zimmer' => __('Zimmer', 'hotel-neumuehle'),
            'tagung' => __('Tagung', 'hotel-neumuehle')
		)
	);
}
endif;
add_action('after_setup_theme', 'hotelneumuehle_setup');


// POST TYPE SUPPORT
function hn_posttype_support() {
	add_post_type_support('page', 'excerpt');
}
add_action('init', 'hn_posttype_support');


// -
function theme_get_archives_link ( $link_html ) {
    global $wp;
    static $current_url;
    if ( empty( $current_url ) ) {
        $current_url = add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
    }
    if ( stristr( $current_url, 'page' ) !== false ) {
		$current_url = substr($current_url, 0, strrpos($current_url, 'page'));
    }
    if ( stristr( $link_html, $current_url ) !== false ) {
        $link_html = preg_replace( '/(<[^\s>]+)/', '\1 class="selected"', $link_html, 1 );
    }
    return $link_html;
}
add_filter('get_archives_link', 'theme_get_archives_link');


// CUSTOM EXCERPT LENGTH
function hn_custom_excerpt_length($length) {
    return 50;
}
add_filter('excerpt_length', 'hn_custom_excerpt_length', 999);


// SHORTCODE [threecolumns]
function hn_threecolumns_shortcode($atts, $content = null) {
	return '<div class="threecolumns">' . $content . '</div>';
}
add_shortcode('threecolumns', 'hn_threecolumns_shortcode'); 


// STYLES + SCRIPTS
function hn_enqueue_scripts() {
	wp_enqueue_style('normalize', get_bloginfo('template_url').'/assets/css/normalize.css', array(), null);
	wp_enqueue_style('fonts', get_bloginfo('template_url').'/assets/css/webfonts.css', array(), null);
	wp_enqueue_style('mmenu', get_bloginfo('template_url').'/assets/css/jquery.mmenu.all.css', array(), null);
	wp_enqueue_style('datepicker', get_bloginfo('template_url').'/assets/css/datepicker.min.css', array(), null);
	wp_enqueue_style('slick', get_bloginfo('template_url').'/assets/css/slick.css', array(), null);
	wp_enqueue_style('core', get_bloginfo('template_url').'/style.css', array(), null);
	wp_enqueue_style('responsive', get_bloginfo('template_url').'/assets/css/responsive.css', array(), null);
	
	wp_enqueue_script('jquery');
    wp_enqueue_script('slick', get_bloginfo('template_url').'/assets/js/slick.min.js', array('jquery'), false, true);
	wp_enqueue_script('mmenu', get_bloginfo('template_url').'/assets/js/jquery.mmenu.all.js', array('jquery'), false, true);
	wp_enqueue_script('datepicker', get_bloginfo('template_url').'/assets/js/datepicker.min.js', array('jquery'), false, true);
	wp_enqueue_script('datepickerDE', get_bloginfo('template_url').'/assets/js/datepicker.de-DE.js', array('jquery'), false, true);
	wp_enqueue_script('core', get_bloginfo('template_url').'/assets/js/script.js', array('jquery'), false, true);
	
	if(is_page('tagung')) {
		wp_enqueue_script('tagung_js', get_bloginfo('template_url').'/assets/js/tagung.js', array('jquery'), false, true);
    }
}
add_action('wp_enqueue_scripts', 'hn_enqueue_scripts');


// CUSTOM POST TYPES
function hn_custom_post_types() {

    // URLAUB
	$labels = array(
		'name'               => _x( 'Urlaube', 'post type general name', 'hotel-neumuehle'),
		'singular_name'      => _x( 'Urlaub', 'post type singular name', 'hotel-neumuehle'),
		'menu_name'          => _x( 'Urlaube', 'admin menu', 'hotel-neumuehle'),
		'name_admin_bar'     => _x( 'Urlaub', 'add new on admin bar', 'hotel-neumuehle'),
		'add_new'            => _x( 'Neuer Urlaub', 'book', 'hotel-neumuehle'),
		'add_new_item'       => __( 'Neuen Urlaub hinzufügen', 'hotel-neumuehle'),
		'new_item'           => __( 'Neuer Urlaub', 'hotel-neumuehle'),
		'edit_item'          => __( 'Urlaub bearbeiten', 'hotel-neumuehle'),
		'view_item'          => __( 'Urlaub ansehen', 'hotel-neumuehle'),
		'all_items'          => __( 'Alle Urlaube', 'hotel-neumuehle'),
		'search_items'       => __( 'Urlaube durchsuchen', 'hotel-neumuehle'),
		'parent_item_colon'  => __( 'Übergeordneter Urlaub', 'hotel-neumuehle'),
		'not_found'          => __( 'Keine Urlaube gefunden', 'hotel-neumuehle'),
		'not_found_in_trash' => __( 'Keine Urlaube gefunden', 'hotel-neumuehle')
	);
	$args = array(
		'labels'             => $labels,
		'description'        => __('Alle Urlaubsangebote des Hotels', 'hotel-neumuehle'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'urlaub'),
		'capability_type'    => 'page',
		'has_archive'        => false,
		'hierarchical'       => true,
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes')
	);
	register_post_type('urlaub', $args);
	
	
	// ZIMMER
	$labels1 = array(
		'name'               => _x( 'Zimmer', 'post type general name', 'hotel-neumuehle'),
		'singular_name'      => _x( 'Zimmer', 'post type singular name', 'hotel-neumuehle'),
		'menu_name'          => _x( 'Zimmer', 'admin menu', 'hotel-neumuehle'),
		'name_admin_bar'     => _x( 'Zimmer', 'add new on admin bar', 'hotel-neumuehle'),
		'add_new'            => _x( 'Neues Zimmer', 'book', 'hotel-neumuehle'),
		'add_new_item'       => __( 'Neues Zimmer hinzufügen', 'hotel-neumuehle'),
		'new_item'           => __( 'Neues Zimmer', 'hotel-neumuehle'),
		'edit_item'          => __( 'Zimmer bearbeiten', 'hotel-neumuehle'),
		'view_item'          => __( 'Zimmer ansehen', 'hotel-neumuehle'),
		'all_items'          => __( 'Alle Zimmer', 'hotel-neumuehle'),
		'search_items'       => __( 'Zimmer durchsuchen', 'hotel-neumuehle'),
		'parent_item_colon'  => __( 'Übergeordnetes Zimmer', 'hotel-neumuehle'),
		'not_found'          => __( 'Keine Zimmer gefunden', 'hotel-neumuehle'),
		'not_found_in_trash' => __( 'Keine Zimmer gefunden', 'hotel-neumuehle')
	);
	$args1 = array(
		'labels'             => $labels1,
		'description'        => __('Alle Zimmer des Hotels', 'hotel-neumuehle'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'zimmer'),
		'capability_type'    => 'page',
		'has_archive'        => false,
		'hierarchical'       => true,
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes')
	);
	register_post_type('zimmer', $args1);
	
	
	// ARRANGEMENTS
	$labels2 = array(
		'name'               => _x( 'Arrangements', 'post type general name', 'hotel-neumuehle'),
		'singular_name'      => _x( 'Arrangement', 'post type singular name', 'hotel-neumuehle'),
		'menu_name'          => _x( 'Arrangements', 'admin menu', 'hotel-neumuehle'),
		'name_admin_bar'     => _x( 'Arrangements', 'add new on admin bar', 'hotel-neumuehle'),
		'add_new'            => _x( 'Neues Arrangement', 'book', 'hotel-neumuehle'),
		'add_new_item'       => __( 'Neues Arrangement hinzufügen', 'hotel-neumuehle'),
		'new_item'           => __( 'Neues Arrangement', 'hotel-neumuehle'),
		'edit_item'          => __( 'Arrangement bearbeiten', 'hotel-neumuehle'),
		'view_item'          => __( 'Arrangement ansehen', 'hotel-neumuehle'),
		'all_items'          => __( 'Alle Arrangements', 'hotel-neumuehle'),
		'search_items'       => __( 'Arrangements durchsuchen', 'hotel-neumuehle'),
		'parent_item_colon'  => __( 'Übergeordnetes Arrangement', 'hotel-neumuehle'),
		'not_found'          => __( 'Keine Arrangements gefunden', 'hotel-neumuehle'),
		'not_found_in_trash' => __( 'Keine Arrangements gefunden', 'hotel-neumuehle')
	);
	$args2 = array(
		'labels'             => $labels2,
		'description'        => __('Alle Arrangements des Hotels', 'hotel-neumuehle'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'arrangements'),
		'capability_type'    => 'page',
		'has_archive'        => false,
		'hierarchical'       => true,
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes')
	);
	register_post_type('arrangements', $args2);
	
	
	// VIER LINKEN
	$labels6 = array(
		'name'               => _x( 'Events', 'post type general name', 'hotel-neumuehle'),
		'singular_name'      => _x( 'Event', 'post type singular name', 'hotel-neumuehle'),
		'menu_name'          => _x( 'Events', 'admin menu', 'hotel-neumuehle'),
		'name_admin_bar'     => _x( 'Events', 'add new on admin bar', 'hotel-neumuehle'),
		'add_new'            => _x( 'Neues Event', 'book', 'hotel-neumuehle'),
		'add_new_item'       => __( 'Neues Event hinzufügen', 'hotel-neumuehle'),
		'new_item'           => __( 'Neues Event', 'hotel-neumuehle'),
		'edit_item'          => __( 'Event bearbeiten', 'hotel-neumuehle'),
		'view_item'          => __( 'Event ansehen', 'hotel-neumuehle'),
		'all_items'          => __( 'Alle Events', 'hotel-neumuehle'),
		'search_items'       => __( 'Events durchsuchen', 'hotel-neumuehle'),
		'parent_item_colon'  => __( 'Übergeordnetes Event', 'hotel-neumuehle'),
		'not_found'          => __( 'Keine Events gefunden', 'hotel-neumuehle'),
		'not_found_in_trash' => __( 'Keine Events gefunden', 'hotel-neumuehle')
	);
	$args6 = array(
		'labels'             => $labels6,
		'description'        => __('Alle Events des Hotels', 'hotel-neumuehle'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'events'),
		'capability_type'    => 'page',
		'has_archive'        => false,
		'hierarchical'       => true,
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes')
	);
	register_post_type('events', $args6);
 
}
add_action('init', 'hn_custom_post_types');



function get_id_by_slug($page_slug) {
	$args=array(
			'name' => $page_slug,
			'post_type' => 'page',
			'post_status' => 'publish',
			'numberposts' => 1
	);
	$my_posts = get_posts($args);
	if( $my_posts ) {
		return $my_posts[0]->ID;
	}else{
		return null;
	}
}

function get_post_by_slug($slug){
    $posts = get_posts(array(
            'name' => $slug,
            'posts_per_page' => 5,
    ));
}
?>