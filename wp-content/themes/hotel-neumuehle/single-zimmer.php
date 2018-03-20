<?php
get_header();
$content = explode("<!--more-->", $post->post_content);
?>

<main id="zimmer-single">

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
				<h1><?php the_title(); ?></h1>
				<hr>
			</div>
			
		</div>
	</section>
	
	<section id="half-layers" class="outer">
		<?php
		$beispiele = new WP_Query(array(
			'post_type' => 'zimmer',
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
				<div class="image-box"<?php echo $thumbnail; ?>>
					<?php if($bilder = get_field('bilder')) : ?>
					<ul>
						<?php
						foreach($bilder as $bild) {
							echo '<li style="background-image:url(\''.$bild['url'].'\');"></li>';
						}
						?>
					</ul>
					<div class="dot-navigation"></div>
					<script>
					jQuery(document).ready(function($) {
						
						$('#half-layers .image-box ul').slick({
							arrows: false,
							dots: true,
							appendDots: '#half-layers .image-box .dot-navigation'
						});
						
					});
					</script>
					<?php endif; ?>
				</div>
				<?php endif; ?>
		
				<div class="text">
					<h2><?php the_title(); ?></h2>
					<hr>
					
					<h3>Ausstattung</h3>
					<?php the_content(); ?>
					
					<?php if($url = get_field('url')) : ?>
					<div class="buttons">
						<a href="<?php echo $url; ?>" class="button red" target="_blank" rel="noopener">
							<div>Jetzt buchen</div>
						</a>
					</div>
					<?php endif; ?>
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