<?php
/*
Plugin Name: re7branding
Plugin URI: http://www.re7consulting.com
Description: Branding des Backends.
Version: 1.1
Author: re7consulting
Author URI: http://www.re7consulting.com
*/

// AUTO-UPDATE THE PLUGIN //
require plugin_dir_path( __FILE__ ).'/plugin-update-checker/plugin-update-checker.php';
$MyUpdateChecker = PucFactory::buildUpdateChecker(
	'http://re7consulting.com/re7_update_server/?action=get_metadata&slug=re7branding', //Metadata URL.
	__FILE__, //Full path to the main plugin file.
	're7branding' //Plugin slug. Usually it's the same as the name of the directory.
);

// BRANDING //
function re7_admin_theme_style() {
    wp_enqueue_style('re7branding', plugins_url('wp-admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 're7_admin_theme_style');
add_action('login_enqueue_scripts', 're7_admin_theme_style');

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'remove_wp_logo', 999);

function re7_adminbar_menu( $meta = TRUE ) {  
    global $wp_admin_bar;  
        if ( !is_user_logged_in() ) { return; }  
        if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }  
    $wp_admin_bar->add_menu( array(  
        'id' => 're7',  
        'title' => __( '<span class="ab-icon"></span><span class="ab-label">' ),  
        'href' => 'http://www.re7consulting.com/',  
        'meta'  => array( 'target' => '_blank' ) )  
    );  
}  
add_action( 'admin_bar_menu', 're7_adminbar_menu', 15 ); 

function re7_loginlogo_url($url) {
	return 'http://www.re7consulting.com';
}
add_filter( 'login_headerurl', 're7_loginlogo_url' );

remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
?>