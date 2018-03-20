<?php
/*
* Template Name: Boxen-Global
*/
get_header();

the_page_header();

$content = get_extended($post->post_content);
?>

<div class="section-content" role="main">
	
	<?php if(!empty($content['main'])) : ?>
	<section class="page-entry container">
		
		<?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
		
		<div class="content">
			<?php echo apply_filters('the_content', $content['main']); ?>
		</div>
		
	</section>
	<?php endif; ?>
	
	<div class="showboxes">
		<div class="container">
		
			<?php if(empty($content['main'])) : ?>
			<?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
			<?php endif; ?>
		
			<div class="box-table">
			<div class="box-row">
		
	    	<?php
			$children = get_pages(array(
				'child_of' => get_the_ID(),
				'sort_order' => 'ASC',
				'sort_column' => 'menu_order',
				'post_type' => 'page',
				'hierarchical ' => true,
				'parent' => get_the_ID(),
				'post_status' => 'publish'
			));
			
			$count = 1;
			foreach ( $children as $li ) {
				if(has_post_thumbnail($li->ID)){
					$plist_bg = get_the_post_thumbnail_data ( $li->ID );
				}else{
					$plist_bg['src'] = null;
				}
				?>
				<div class="box" style="background-image: url( <?php echo $plist_bg['src'];?> );">
						<div class="box-inner">
							<div>
								<h2><?php echo $li->post_title; ?></h2>
								<div class="excerpt">
									<p><?php echo $li->post_excerpt; ?></p>
								</div>
							</div>
							<a href="<?php echo get_permalink($li->ID) ?>"><?php _e('Details', 'mehler-ep'); ?></a>
						</div>
						
					</div>
				<?php
				if($count % 3 == 0)
					echo '</div><div class="box-row">';
				
				$count++;
			}
			?>
			
			</div>
			</div>
			
		</div>
	
	</div>
	
	<?php if(!empty($content['extended'])) : ?>
	<section class="page-entry container">
		<div class="content">
			<?php echo apply_filters('the_content', $content['extended']); ?>
		</div>
	</section>
	<?php endif; ?>
	
	<?php get_template_part('templates/cta', 'contact'); ?>
	
</div>

<?php get_footer(); ?>