<?php
get_header();
the_page_header();
?>

<div id="content" role="main">
	
	<?php if (have_posts()) : ?>
	
 	<div class="showboxes" style="background-color: rgb(255,255,255);">
 		<div class="container">
			
			<?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
			
			<?php
			$count = 1;
			
			while (have_posts()) : the_post();
				$thumbnail = (has_post_thumbnail()) ? ' style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : '';
				$last = ($count % 3 == 0) ? ' last_box' : '';
				?>
				<div class="cate_box<?php echo $last; ?>">
					<div class="img_box"<?php echo $thumbnail; ?>></div>
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink() ?>">zum Eintrag</a>
				</div>
				<?php
				if($count % 3 == 0)
					echo '<div class="clearfix"></div>';
			
				$count++;
			
			endwhile;
			wp_reset_postdata();
			?>
			
			<div class="clearfix"></div>
			<?php previous_posts_link('&laquo; Zurück'); ?>
			&nbsp;&nbsp;
			<?php next_posts_link('Weiter &raquo;'); ?>

		</div>
	</div>
	
	<?php else : ?>
	
	<div class="container">
	  
		<?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
		<h2><?php _e('Leider keine Einträge vorhanden', 'mehler-ep'); ?></h2>
 	
	</div>
	
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>