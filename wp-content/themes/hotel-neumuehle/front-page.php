<?php
get_header();
$content = explode("<!--more-->", $post->post_content);
?>
<main id="frontpage">

	<section id="startseite-slider">
		<?php echo do_shortcode('[masterslider id="1"]'); ?>
	</section>

	<section class="outer cta-text-buchen clearfix">
		<div class="lt-back">
			<div class="text">
				<?php echo apply_filters('the_content', $content[0]); ?>
			</div>
		</div>
		<div class="rt-back">
			<?php get_template_part('templates/sektion', 'anfragen'); ?>
		</div>
	</section>
	
	<section id="zimmer-vergleich" class="outer">
		<div class="inner">
		
			<div class="deco white"></div>
			<h2>Unsere Zimmer</h2>
			<hr>
			
			<div class="alle-zimmer clearfix">
				<?php
				$zimmer = new WP_Query(array(
					'post_type' => 'zimmer',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post_parent' => 0,
					'nopaging' => true
				));
				
				if($zimmer->have_posts()) : while($zimmer->have_posts()) : $zimmer->the_post();
					$thumbnail = (has_post_thumbnail()) ? ' style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id()).');"' : '';
				?>
				<div class="zimmer-wrap <?php echo $post->post_name; ?>">
				<div class="zimmer">
					<div class="head">
						<div class="deco white"></div>
						<h3><?php the_title(); ?></h3>
						<hr>
					</div>
					<div class="image"<?php echo $thumbnail; ?>></div>
					<div class="details">
						<?php if(have_rows('vergleich')) : ?>
						<ul>
							<?php while(have_rows('vergleich')) : the_row(); ?>
							<li><?php the_sub_field('punkt'); ?></li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
				</div>
				<?php
				endwhile; endif;
				wp_reset_postdata();
				?>
				<script>
				jQuery(document).ready(function($) {
					
					if($(window).width() > 1280) {
					
						// SET HEIGHT TO EACH ZIMMER-WRAP
						var tableHeight = $('.alle-zimmer').height();
						$('.alle-zimmer .zimmer-wrap').each(function() {
							$(this).css('height', tableHeight + 'px');
						});
						
						// HIGHLIGH "COMFORT" ZIMMER
						$('.alle-zimmer .zimmer-wrap.comfort').addClass('active');
						
						// HIDE "ACTIVE" ZIMMER WHILE HOVER
						var current = $('.alle-zimmer .zimmer-wrap.active');
						$('.zimmer-wrap').mouseover(function() {
							$('.alle-zimmer .zimmer-wrap').removeClass('active');
						}).mouseleave(function() {
							current.addClass('active');
						});
					
					}
					else {
						
						if($(window).width() >= 640) {
							
							// SET HEIGHT TO EACH ZIMMER-WRAP
							var tableHeight = $('.alle-zimmer .zimmer-wrap.deluxe').height() + 30;
							$('.alle-zimmer .zimmer-wrap').each(function() {
								$(this).css('height', tableHeight + 'px');
							});
							
						}
						
					}
					
				});
				</script>
			</div>
			
			<div class="buttons">
				<a href="https://www.cbooking.de/v4/booking.aspx?id=neumuehle&module=public&ratetype=bar&lang=de" class="button white" target="_blank" rel="noopener">
					<div>Anfragen</div>
				</a>
			</div>
		
		</div>
	</section>
	
	<section id="drei-gruende" class="outer">
		<div class="inner">
			
			<div class="deco"></div>
			
			<div class="text">
				<?php echo apply_filters('the_content', $content[1]); ?>
			</div>
			
			<div class="drei-gruende-wrap clearfix">
			
				<?php if(have_rows('drei-gute-gruende')) : while(have_rows('drei-gute-gruende')) : the_row(); ?>
				<div class="punkt">
					<a href="<?php the_sub_field('link') ?>" style="background-image:url(<?php the_sub_field('hintergrundbild'); ?>);">
						<div class="label-wrap">
							<div class="label">
								<hr>
								<?php the_sub_field('label'); ?>
							</div>
						</div>
					</a>
				</div>
				<?php endwhile; else : ?>
				<p>Keine Einträge in dieser Kategorie</p>
				<?php endif; ?>
				
			</div>
			
		</div>
	</section>
	
	<?php if(have_rows('vier-links')) : ?>
	<section id="vier-links" class="outer clearfix">
		<?php while(have_rows('vier-links')) : the_row(); ?>
		<div class="box" style="background-image:url('<?php the_sub_field('hintergrundbild'); ?>');">
			<span></span>
			<a href="<?php the_sub_field('link'); ?>">
				<div class="mask">
					<hr>
					<p><?php the_sub_field('titel'); ?></p>
				</div>
			</a>
		</div>
		<?php endwhile; ?>
	</section>
	<?php endif; ?>
	
    <section class="outer" id="frontpage-text">
		<div class="inner">
		
			<div class="text">
				<?php echo apply_filters('the_content', $content[2]); ?>
			</div>
		
		</div>
	</section>
	
	<section id="sponsors" class="outer">
		<div class="inner clearfix">
		
			<div class="sponsor">
				<img src="<?php bloginfo('template_url'); ?>/assets/images/partner/romantik.png">
			</div>
			<div class="sponsor big">
				<img src="<?php bloginfo('template_url'); ?>/assets/images/partner/weinschoenerland.png">
			</div>
			<div class="sponsor">
				<img src="<?php bloginfo('template_url'); ?>/assets/images/partner/sightsleeping.png">
			</div>
			
		</div>
	</section>
	
	<?php get_template_part('templates/sektion', 'events'); ?>
	
	<?php get_template_part('templates/sektion', 'galleryFull'); ?>

	<section id="kontakt" class="outer">
		<div class="inner">
			
			<div class="deco"></div>
			<h2>Haben Sie Fragen?</h2>
			<hr>
			
			<?php echo do_shortcode('[contact-form-7 id="4" title="Contact form 1"]'); ?>
			
		</div>
	</section>
	
	<?php get_template_part('templates/sektion', 'map'); ?>
	
	<section id="erkunden" class="outer">
		<div class="inner">
			<div class="erkunden-wrap">
				<p>Erkunden und Geniessen Sie unser Hotel</p>
			</div>
			<a href="#top" class="button">
				<div></div>
			</a>
		</div>
	</section>

</main>

<?php get_footer(); ?>