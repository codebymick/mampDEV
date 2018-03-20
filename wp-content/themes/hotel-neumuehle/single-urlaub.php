<?php
get_header();
$content = explode("<!--more-->", $post->post_content);
?>

<main id="urlaub-single">

	<section id="subpage-slider">
		<?php
		if(get_field('slider-shortcode')) :
			echo do_shortcode(get_field('slider-shortcode', false, false));
		else :

			$slider = false;
			$parents = get_post_ancestors(get_the_ID());

			if(!empty($parents)) :
				foreach($parents as $parent) :
					$shortcode = trim(get_field('slider-shortcode', $parent));
					if($shortcode && !empty($shortcode)) :
						$slider = get_field('slider-shortcode', $parent, false);
						break;
					endif;
				endforeach;
			endif;

			if($slider)
				echo do_shortcode($slider);
			else
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
	
	<section id="half-layers" class="outer">
		<?php
		$beispiele = new WP_Query(array(
			'post_type' => 'urlaub',
			'post_parent' => get_the_ID(),
			'nopaging' => true,
			'order' => 'ASC',
			'orderby' => 'title'
		));
		
		$count = 1;
		
		if($beispiele->have_posts()) : while($beispiele->have_posts()) : $beispiele->the_post();
			$thumbnail = (has_post_thumbnail()) ? ' style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : '';
			?>
			
			<div class="entry clearfix">
			
				<?php if(($count % 2 != 0)) : ?>
				<div class="image-box"<?php echo $thumbnail; ?>></div>
				<?php endif; ?>
		
				<div class="text">
					<h2><?php the_title(); ?></h2>
					<hr>
					
					<?php the_content(); ?>
					
					<div class="buttons">
						<?php if($buchung = get_field('buchung-url')) : ?>
						<a href="<?php echo $buchung; ?>" class="button red" target="_blank" rel="noopener">
							<div>Zur Buchung</div>
						</a>
						<?php endif; ?>
						<?php if($gutschein = get_field('gutschein-url')) : ?>
						<a href="<?php echo $gutschein; ?>" class="button red" target="_blank" rel="noopener">
							<div>Zum Gutschein</div>
						</a>
						<?php endif; ?>
					</div>
				</div>
				
				<?php if(($count % 2 == 0)) : ?>
				<div class="image-box"<?php echo $thumbnail; ?>></div>
				<?php endif; ?>
			
			</div>
			
			<?php
			$count++;
			
		endwhile; endif;
		wp_reset_postdata();
		?>
	</section>
	
	<?php 
	get_template_part('templates/sektion', 'kontakt');
	get_template_part('templates/sektion', 'cta');
	get_template_part('templates/sektion', 'arrangements');
	?>
	
</main>

<?php get_footer(); ?>