<?php
function twine_scrollbar_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_register_script(  'jquery.twine.js', plugins_url( '/assets/jquery.twine.js' , __FILE__ ), array(), '1.0.0', false );
	wp_localize_script( 'jquery.twine.js', 'twineobject', array( 'siteurl' => get_site_url()) );
	wp_enqueue_script( 'jquery.twine.js' );
	wp_enqueue_style( 'style.css', plugins_url( '/assets/style.css' , __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'twine_scrollbar_scripts' );
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);