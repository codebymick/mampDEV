<?php
/*
 * Plugin Name: Twine-Scrollbar-Shortcoder
 * Plugin URI: https://www.re7consulting.com
 * Description: Fadenscrollbar
 * Version: 1.1
 * Text Domain: twine-scrollbar-shortcode
 * Author: re7consulting
 * Author URI: https://www.re7consulting.com
 * Required at least: 4.0
 * @autor re7consulting
 * @since 1.0.0
 */

require_once('twine-scrollbar-includes.php');

function twine_func( $atts, $content ){
	$att = shortcode_atts( array(
        'id' => 'twine'
    ), $atts );
	$twine .= '<div id="'.$att['id'].'" class="twine">';
		$twine .= do_shortcode($content);
	$twine .= '</div><script>jQuery("#'.$att['id'].'").twine();</script>';
	return wpautop(trim($twine));
}
add_shortcode( 'twine', 'twine_func' );


function twine_section_func( $atts, $content ){
	$att = shortcode_atts( array(
        'section' => '1'
    ), $atts );
	$twine_section .= '<div data-section="'.$att['section'].'" class="twine-section">';
		$twine_section .= do_shortcode($content);
	$twine_section .= '</div>';
	return $twine_section;
}
add_shortcode( 'twine_section', 'twine_section_func' );

function twine_image_func( $atts, $content ){
	$twine_image .= '<div class="twine-image"><div>';
		$twine_image .= $content;
	$twine_image .= '</div></div>';
	return $twine_image;
}
add_shortcode( 'twine_image', 'twine_image_func' );

function twine_text_func( $atts, $content ){
	$twine_text .= '<div class="twine-text"><div class="text-sec">';
		$twine_text .= $content;
	$twine_text .= '</div></div>';
	return $twine_text;
}
add_shortcode( 'twine_text', 'twine_text_func' );

function twine_hr_func( $atts, $content ){
	$twine_hr .= '<div class="twine-hr">';
		$twine_hr .= '<div class="horizontel"></div>';
		$twine_hr .= '<div class="activator"></div>';
		$twine_hr .= '<div class="anker"></div>';
	$twine_hr .= '</div>';
	return $twine_hr;
}
add_shortcode( 'twine_hr', 'twine_hr_func' );

function shortcode_empty_paragraph_fix( $content ) {
    $shortcodes = array( 'twine', 'twine_left', 'twine_right', 'twine_text', 'twine_image' );
    foreach ( $shortcodes as $shortcode ) {
        $array = array (
            '<p>[' . $shortcode => '[' .$shortcode,
            '<p>[/' . $shortcode => '[/' .$shortcode,
            $shortcode . ']</p>' => $shortcode . ']',
            $shortcode . ']<br />' => $shortcode . ']',
            $shortcode . ']<br>' => $shortcode . ']'
        );
        $content = strtr( $content, $array );
    }
    return $content;
}
add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );
add_filter( 'the_content', 'shortcode_unautop',100 );