<?php
/*
* Template Name: News-Template
*/
get_header();

the_page_header();
 
$content_arr = get_extended($post->post_content);
?>

<div class="section-content" role="main">
	
	<div id="news" class="container">
		
		<div id="entries">
		<?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
	
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$newsargs = array (
				'posts_per_page' => 5,
				'paged' => $paged,
				'category_name' => $post->post_name,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish' 
		);
		$news_posts = query_posts( $newsargs );
		foreach ( $news_posts as $news_post ) {
			echo '<article class="news-post">';
			if (has_post_thumbnail ( $news_post->ID )) {
				echo '<div class="news-post-thumb">';
				echo get_the_post_thumbnail ( $news_post->ID, 'thumbnail' );
				echo '</div>';
			}
			echo '<div class="news-post-text">';
				echo '<h2><a href="' . get_permalink ( $news_post->ID ) . '">' . $news_post->post_title . '</a></h2>';
						echo '<p class="news-date">' . _e('Erstellt am: ', 'mehler-ep') . mysql2date('j M Y',$news_post->post_date) . '</p><hr>';

					echo '<p style="margin-bottom: 25px">' . $news_post->post_excerpt . '</p>';
					
            echo '<a class="news-button" href="' . get_permalink ( $news_post->ID ) . '">';?> <?php _e('weiterlesen', 'mehler-ep');?></a>
					
					<?php
				echo '</div>';
				echo '<div class="clearfix"></div>';
			echo '</article>';
		}
		?>
		</div>
		
		<div class="clearfix"></div>
		
		<div class="entry-pagination">
		<?php
			previous_posts_link();?><span>   </span>
      
      <?php
 next_posts_link();
		?>
		</div>
		
		<div class="clearfix"></div>

	</div>
	
	<section class="page-entry container">
		<div class="content">
			<?php echo apply_filters('the_content', $content['main']); ?>
		</div>
	</section>
	
	<?php if(!empty($content['extended'])): ?>
	<section class="page-entry container">
		<div class="content">
			<?php echo apply_filters('the_content', $content['extended']); ?>
		</div>
	</section>
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>