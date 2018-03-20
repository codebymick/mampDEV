<?php

if(!function_exists('mehlerep_setup')) :
function mehlerep_setup() {
 
    load_theme_textdomain('mehler-ep', get_template_directory() . '/languages');

    add_theme_support('post-thumbnails');
 
    register_nav_menus(array(
        'primary'   => __( 'Hauptmenü', 'mehler-ep' ),
        'pre-header' => __('Pre-Header', 'mehler-ep' ),
		'footer1' => __('Footermenü 1', 'mehler-ep' ),
		'footer2' => __('Footermenü 2', 'mehler-ep' ),
		'footer3' => __('Footermenü 3', 'mehler-ep' ),
		'footer4' => __('Footermenü 4', 'mehler-ep' )
    ));
	
}
endif;
add_action('after_setup_theme', 'mehlerep_setup');


//move wpautop filter to AFTER shortcode is processed
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );


// RESPONSIVE ANIMATIONS
function mehler_custom_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-effects-core');
	
	wp_enqueue_script('pushy', get_template_directory_uri() . '/js/pushy.min.js', array('jquery'), null);
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), null);
	wp_enqueue_script('core', get_template_directory_uri() . '/js/functions.js', array('jquery'), null);
	
	wp_enqueue_style('pushy', get_template_directory_uri() . '/css/pushy.css');
	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css');
	wp_enqueue_style('boxes', get_template_directory_uri() . '/css/boxes.css');
	wp_enqueue_style('core', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
}
add_action( 'wp_enqueue_scripts', 'mehler_custom_scripts' );


// Search Filter
add_filter('posts_groupby', 'group_by_post_title' );
function group_by_post_title( $groupby )
{
	global $wpdb;
	if( !is_search() ) {
		return $groupby;
	}
	if(is_admin()){
		return $groupby;
	}
	$mygroupby = "{$wpdb->posts}.post_title";
	if( !strlen(trim($groupby))) {
		return $mygroupby;
	}
	return $groupby . ", " . $mygroupby;
}


/* NAVIGATION */
function the_navigation(){
	add_filter('wp_nav_menu_items','add_last_nav_item');
	?>
    <nav>
        <div class="left-nav-bg"></div>
        <div class="right-nav-bg"></div>
        <div class="clearfix"></div>
        <div id="navigation">
            <div class="container">
                <div id="brand">
                    <a href="<?php bloginfo('url') ?>">
							<img src="<?php bloginfo('template_url');?>/img/logo.png" alt="MEHLER Logo"/>
						</a>
                </div>
                <div id="menu">
                    <?php
							$defaults = array(
								'theme_location'  => 'primary',
								'menu'            => '',
								'container'       => 'menu_container',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 3,
								'walker'          => ''
							);
							wp_nav_menu( $defaults );
						?>
                </div>
            </div>
        </div>
    </nav>
    <?php
	remove_filter('wp_nav_menu_items','add_last_nav_item');
}


/* SEARCH */
function add_last_nav_item($items) {
	return $items .= '<li class="search"><div class="customsearch"><form role="search" method="get" id="searchform" class="searchform" action="'.esc_url( home_url( '/' ) ).'"><input type="text" name="s" id="search" /></form></div><a href="#search"><img src="'.get_bloginfo('template_url').'/img/search-icon.png" /></a></li>';
}


/* PAGE HEADER */
function the_page_header() {
	
	$header = get_field('headerbild');
	
	if($header) :
		$thumbnail = $header['url'];
	else :
	
		$thumbnail = get_post_meta( get_the_ID(), 'meta-header-image', true );
		if(empty($thumbnail)) {
			if(is_single())
				$thumbnail = get_bloginfo('template_url').'/img/news_headline.jpg';
			else
				$thumbnail = get_bloginfo('template_url').'/img/headerbg.jpg';
			
		}
		if(is_search()) {
			$thumbnail = get_bloginfo('template_url').'/img/lupe-headline.jpg';	
		}
	
	endif;
	
	global $post;
	
	?>
        <div id="page-header" <?php echo 'style="background-image: url('.$thumbnail. ')"';?>>
            <div class="container">
                <?php if(is_search()): ?>
                <h1><?php _e('Ihre Suche nach ', 'mehler-ep'); ?> <span class="search-title"><?php echo get_search_query();?></span><br> <?php _e(' ergab folgende Ergebnisse', 'mehler-ep'); ?></h1>
                <?php else: ?>
                <h2>
                    <?php the_title();?>
                </h2>
                <p>
                    <?php echo $post->post_excerpt;?>
                </p>
                <?php endif;?>
            </div>
        </div>
        <?php
}


/* PAGE EXCERPTS */
add_action( 'init', 'add_excerpts_to_pages' );
function add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}


/* KONTAKTFORMULAR */
function get_contact_form(){
	?>
            <?php if(ICL_LANGUAGE_CODE == 'de'):?>
            <div id="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="142" title="Kontakt Formular"]'); ?>
            </div>
            <?php elseif(ICL_LANGUAGE_CODE == 'en'):?>
            <div id="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="1364" title="Kontakt Formular_EN"]'); ?>
            </div>
            <?php
	endif;
}
	
/* PRODUCTLIST FOR SHOWBOXES */
function get_children_pages( $slug ){
	$pagesargs = array(
			'child_of' =>get_id_by_slug($slug) ,
			'sort_order' => 'ASC',
			'sort_column' => 'menu_order',
			'post_type' => 'page',
			'hierarchical ' => true,
			'parent' => get_id_by_slug($slug),
			'post_status' => 'publish'
	);
	$children = get_pages( $pagesargs );
	return $children;
}

function get_children_pages_by_id($id){
	$pagesargs = array(
			'child_of' =>$id ,
			'sort_order' => 'ASC',
			'sort_column' => 'menu_order',
			'post_type' => 'page',
			'hierarchical ' => true,
			'parent' => $id,
			'post_status' => 'publish'
	);
	$children = get_pages( $pagesargs );
	return $children;
}

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

function get_the_post_thumbnail_data($intID = 0) {
	if($intID == 0) {
		return $intID;
	}
	$objDom = new SimpleXMLElement(get_the_post_thumbnail($intID));
	$arrDom = (array)$objDom;
	return (array)$arrDom['@attributes'];
}

/*WRAPPER FUNCTION FOR FRONT PAGE H*/
function insertSpanInH($title){
	$words = explode(' ',trim($title));
	$first = $words[0];
	return preg_replace('/'.$first.'/', '<span>'.$first.'</span>', $title);
}


function mep_custom_posttypes() {
	
	$labels = array(
		'name'               => _x( 'Produkte', 'post type general name', 'mehler-ep' ),
		'singular_name'      => _x( 'Produkt', 'post type singular name', 'mehler-ep' ),
		'menu_name'          => _x( 'Produkte', 'admin menu', 'mehler-ep' ),
		'name_admin_bar'     => _x( 'Produkte', 'add new on admin bar', 'mehler-ep' ),
		'add_new'            => _x( 'Neues Produkt hinzufügen', 'book', 'mehler-ep' ),
		'add_new_item'       => __( 'Neues Produkt hinzufügen', 'mehler-ep' ),
		'new_item'           => __( 'Neues Produkt', 'mehler-ep' ),
		'edit_item'          => __( 'Produkt bearbeiten', 'mehler-ep' ),
		'view_item'          => __( 'Produkt ansehen', 'mehler-ep' ),
		'all_items'          => __( 'Alle Produkte', 'mehler-ep' ),
		'search_items'       => __( 'Produkte durchsuchen', 'mehler-ep' ),
		'not_found'          => __( 'Keine Produkte gefunden.', 'mehler-ep' ),
		'not_found_in_trash' => __( 'Keine Produkte gefunden.', 'mehler-ep' )
	);
	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Alle Produkte der Mehler EP', 'mehler-ep' ),
		'public'             => true,
		'rewrite'            => array( 'slug' => 'produkte' ),
		'capability_type'    => 'page',
		'has_archive'        => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'hierarchical'       => true,
		'menu_icon'          => 'dashicons-tag'
	);
	register_post_type('mep_produkte', $args);
	
	
	$labels2 = array(
		'name'               => _x( 'Branchen', 'post type general name', 'mehler-ep' ),
		'singular_name'      => _x( 'Branche', 'post type singular name', 'mehler-ep' ),
		'menu_name'          => _x( 'Branchen', 'admin menu', 'mehler-ep' ),
		'name_admin_bar'     => _x( 'Branchen', 'add new on admin bar', 'mehler-ep' ),
		'add_new'            => _x( 'Neue Branche hinzufügen', 'book', 'mehler-ep' ),
		'add_new_item'       => __( 'Neue Branche hinzufügen', 'mehler-ep' ),
		'new_item'           => __( 'Neue Branche', 'mehler-ep' ),
		'edit_item'          => __( 'Branche bearbeiten', 'mehler-ep' ),
		'view_item'          => __( 'Branche ansehen', 'mehler-ep' ),
		'all_items'          => __( 'Alle Branchen', 'mehler-ep' ),
		'search_items'       => __( 'Branchen durchsuchen', 'mehler-ep' ),
		'not_found'          => __( 'Keine Branchen gefunden.', 'mehler-ep' ),
		'not_found_in_trash' => __( 'Keine Branchen gefunden.', 'mehler-ep' )
	);
	$args2 = array(
		'labels'             => $labels2,
        'description'        => __( 'Alle Branchen der Mehler EP', 'mehler-ep' ),
		'public'             => true,
		'rewrite'            => array( 'slug' => 'branchen' ),
		'capability_type'    => 'page',
		'has_archive'        => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'hierarchical'       => true,
		'menu_icon'          => 'dashicons-admin-multisite'
	);
	register_post_type('mep_branchen', $args2);

}
add_action('init', 'mep_custom_posttypes', 0);


// Individual CTA
function mehler_cta_func() {
	
	if(!get_field('indi_cta_aktivieren'))
		return false;
	
	if(!get_field('indi_cta_text') || !get_field('indi_cta_button_label') || !get_field('indi_cta_button_ziel'))
		return false;
	
	ob_start();
	
	global $post;
	
	switch($post->post_type) :
		case 'page':
		case 'mep_branchen':
			if(get_page_template_slug($post->ID) != 'page-contact.php' && get_page_template_slug($post->ID) != 'template-stellenangebot.php')
				echo '</div></section></div>';
			break;
		case 'mep_produkte':
			$children = get_children(array(
				'post_parent' => $post->ID,
				'post_type' => 'mep_produkte',
				'post_status' => 'publish'
			));
			if(!empty($children))
				echo '</div></section></div>';
			
			break;
		case 'post':
			echo '</div></div></article></div></div>';
			break;
	endswitch;
	
	?>
                <section class="cta cta-contact">
                    <?php echo __(get_field('indi_cta_text'), 'mehler-ep'); ?>
                    <a href="<?php the_field('indi_cta_button_ziel'); ?>" class="button">
                        <?php echo __(get_field('indi_cta_button_label'), 'mehler-ep'); ?>
                    </a>
                </section>
                <?php
	
	switch($post->post_type) :
		case 'page':
		case 'mep_branchen':
			if(get_page_template_slug($post->ID) != 'page-contact.php' && get_page_template_slug($post->ID) != 'template-stellenangebot.php')
				echo '<div class="section-content" role="main"><section class="page-entry container"><div class="content">';
			break;
		case 'mep_produkte':
			$children = get_children(array(
				'post_parent' => $post->ID,
				'post_type' => 'mep_produkte',
				'post_status' => 'publish'
			));
			if(!empty($children))
				echo '<div class="section-content" role="main"><section class="page-entry container"><div class="content">';
			
			break;
		case 'post':
			echo '<div class="section-content" role="main"><div class="container"><article class="news-post"><div class="news-post-text"><div class="content">';
			break;
	endswitch;
	
	$output = ob_get_contents();
	ob_end_clean();
	
	return $output;
}
add_shortcode('mehler-cta', 'mehler_cta_func');
?>
