<?php
get_header();
$content = explode("<!--more-->", $post->post_content);
?>

<main id="zimmer">

	<section id="subpage-slider">
		<?php
		if(get_field('slider-shortcode')) :
			echo do_shortcode(get_field('slider-shortcode', false, false));
		else :
			masterslider(1);
		endif;
		?>
		
		<?php get_template_part('templates/sektion', 'selektor'); ?>
	</section>
	
	<section id="intro" class="outer">
		<div class="inner">
		
			<div class="deco"></div>
			<div class="text">
				<?php echo apply_filters('the_content', $content[0]); ?>
			</div>
			
		</div>
	</section>
	
	<section id="vier-gruende" class="outer">
		<div class="inner">
		
			
			<div class="row clearfix">
				<?php
				$gruende = new WP_Query(array(
					'post_type' => 'zimmer',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post_parent' => 0,
					'nopaging' => true
				));

				$count = 1;

				if($gruende->have_posts()) : while($gruende->have_posts() ) : $gruende->the_post();
				
					$thumbnail = (has_post_thumbnail()) ? 'style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : '';
					?>
					<div class="punkt">
						<a href="<?php the_permalink(); ?>" class="mask"<?php echo $thumbnail; ?>>
							<div class="label-wrap">
								<div class="label">
									<hr>
									<?php the_title(); ?>
									<?php if(have_rows('vergleich')) : ?>
									<div class="bulletpoints">
										<ul>
										<?php while(have_rows('vergleich')) : the_row(); ?>
										<li><?php the_sub_field('punkt'); ?></li>
										<?php endwhile; ?>
										</ul>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</a>
					</div>
					<?php 
					if($count % 2 == 0)
						echo '</div><div class="row clearfix">';
		
					$count++;
		
				endwhile;
				wp_reset_postdata();
		
				else:
					echo '<p>Keine Einträge in dieser Kategorie</p>';
				endif;
				?>
			</div>
		
		</div>
	</section>
	
	<?php if(isset($content[1])) : ?>
	<section id="subpage-text" class="outer">
		<div class="inner">
		
			<div class="text">
				<?php echo apply_filters('the_content', $content[1]); ?>
			</div>
			
		</div>
	</section>
	<?php endif; ?>
	
	<?php get_template_part('templates/sektion', 'galleryFull'); ?>

	<?php get_template_part('templates/sektion', 'cta'); ?>
	
</main>

<?php get_footer(); ?>